<?php

namespace App\Http\Controllers;

 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Zwierzaki;
use App\Models\Pochodzenie;
use App\Models\klatki;
use App\Models\Opiekunowie;
use App\Models\User;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class ZwierzakiController extends Controller
{
  // W kontrolerze


  //wyswietlanie wszystkich informacji z tabel pochodzenie klatki opiekunowie
  public function index()
{
  $zwierzaki = Zwierzaki::with(['pochodzenie', 'klatki', 'opiekunowie'])->get();
  
    return view('schronisko.zwierzeta', [
      'zwierzaki' => $zwierzaki,
      
    ]);
}
//wyswietlanie wszystkich informacji z tabel pochodzenie klatki opiekunowie
//zwracanie widoku index.blade.php z random ( zawsze 3 randomowymi zwierzetami)
public function index1()
{
    $zwierzaki = Zwierzaki::with(['pochodzenie', 'klatki', 'opiekunowie'])->get();
    $random = Zwierzaki::where('status_adopcji', false)->inRandomOrder()->take(3)->get();
    return view('schronisko.index', [
      'zwierzaki' => $zwierzaki,
      //'random' => $zwierzaki->random(3),
      'random' => $random,
    ]);
}
//dd($zwierzaki);
//odnosi sie o więcej informacji o danym zwierzaku
public function show($id)
{
   
    $zwierz = Zwierzaki::find($id); 
    if (!$zwierz) {
        abort(404);
    }
    return view('schronisko.show', compact('zwierz'));
}
//tworzy nowego zwierzaka
public function create()
    {
        
        return view('schronisko.dodaj');
    }

    public function store(Request $request)
    {

        

          $user = Auth::user();
        // Walidacja danych wejściowych
        $validatedData = $request->validate([
            'imię' => 'required|string|max:255',
            'gatunek' => 'required|string|max:255|regex:/^[a-zA-Z-ĄąĆćĘęŁłŃńÓóŚśŹźŻż\s]+$/',
            'wiek' => 'required|integer|min:1',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stan_zdrowia' => 'required|string|max:255|regex:/^[a-zA-Z-ĄąĆćĘęŁłŃńÓóŚśŹźŻż\s]+$/',
            'rasa' => 'required|string|max:255|regex:/^[a-zA-Z-ĄąĆćĘęŁłŃńÓóŚśŹźŻż\s]+$/',
            'opiekun_id' => 'required|exists:opiekunowie,opiekun_id',
            'id_klatki' => 'required|exists:klatki,id_klatki',
        ],[
            'imię.required' => 'Pole imię jest wymagane.',
    'imię.string' => 'Pole imię musi być ciągiem znaków.',
    'imię.max' => 'Pole imię może mieć maksymalnie 255 znaków.',
    'gatunek.required' => 'Pole gatunek jest wymagane.',
    'gatunek.string' => 'Pole gatunek musi być ciągiem znaków.',
    'gatunek.max' => 'Pole gatunek może mieć maksymalnie 255 znaków.',
    'gatunek.regex' => 'Pole gatunek może zawierać tylko litery i spacje.',
    'wiek.required' => 'Pole wiek jest wymagane.',
    'wiek.integer' => 'Pole wiek musi być liczbą całkowitą.',
    'wiek.min' => 'Pole wiek musi mieć wartość co najmniej 1.',
    'img.required' => 'Pole zdjęcie jest wymagane.',
    'img.image' => 'Pole zdjęcie musi być obrazem.',
    'img.mimes' => 'Pole zdjęcie musi być w formacie jpeg, png, jpg, lub gif.',
    'img.max' => 'Pole może zawierac maksymalnie 2048KB',
    'stan_zdrowia.required' => 'Pole stan zdrowia jest wymagane.',
    'stan_zdrowia.string' => 'Pole stan zdrowia musi być ciągiem znaków.',
    'stan_zdrowia.max' => 'Pole stan zdrowia może mieć maksymalnie 255 znaków.',
    'stan_zdrowia.regex' => 'Pole stan zdrowia może zawierać tylko litery i spacje.',
    'rasa.required' => 'Pole rasa jest wymagane.',
    'rasa.string' => 'Pole rasa musi być ciągiem znaków.',
    'rasa.max' => 'Pole rasa może mieć maksymalnie 255 znaków.',
    'rasa.regex' => 'Pole rasa może zawierać tylko litery i spacje.'

        ]);
    
        // Tworzenie nowego zwierzaka na podstawie przekazanych danych
        $zwierzak = new Zwierzaki();
        $zwierzak->imię = $validatedData['imię'];
        $zwierzak->gatunek = $validatedData['gatunek'];
        $zwierzak->wiek = $validatedData['wiek'];
       if($request->hasFile('img')){
        $originalName = $request->file('img')->getClientOriginalName();
    
    $fileName = pathinfo($originalName, PATHINFO_FILENAME) . '.' . $request->file('img')->getClientOriginalExtension();
    
    $path = $request->file('img')->storeAs('public/img', $fileName);

       
        $zwierzak->img = $fileName;
    }
        $zwierzak->stan_zdrowia = $validatedData['stan_zdrowia'];
        $zwierzak->rasa = $validatedData['rasa'];
        $zwierzak->opiekun_id = $validatedData['opiekun_id'];
        $zwierzak->id_klatki = $validatedData['id_klatki'];
        
        $zwierzak->save();
        
        // Przekierowanie użytkownika na inną stronę lub wyświetlenie komunikatu sukcesu
        return redirect()->route('schronisko.zwierzeta')->with('success', 'Zwierzak został pomyślnie dodany.');
    }


    public function edit($id)
    {
        $zwierzak = Zwierzaki::findOrFail($id);
        return view('schronisko.edit', compact('zwierzak'));
    }

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'imię' => 'required|string|max:255',
        'gatunek' => 'required|string|max:255|regex:/^[a-zA-Z-ĄąĆćĘęŁłŃńÓóŚśŹźŻż\s]+$/',
        'wiek' => 'required|integer|min:1',
        'stan_zdrowia' => 'required|string|max:255|regex:/^[a-zA-Z-ĄąĆćĘęŁłŃńÓóŚśŹźŻż\s]+$/',
        'rasa' => 'required|string|max:255|regex:/^[a-zA-Z-ĄąĆćĘęŁłŃńÓóŚśŹźŻż\s]+$/',
        'opiekun_id' => 'required|exists:opiekunowie,opiekun_id',
        'id_klatki' => 'required|exists:klatki,id_klatki',
        
        // Dodaj walidację dla pozostałych pól
    ],[
    'imię.required' => 'Pole imię jest wymagane.',
    'imię.string' => 'Pole imię musi być ciągiem znaków.',
    'imię.max' => 'Pole imię może mieć maksymalnie 255 znaków.',
    'gatunek.required' => 'Pole gatunek jest wymagane.',
    'gatunek.string' => 'Pole gatunek musi być ciągiem znaków.',
    'gatunek.max' => 'Pole gatunek może mieć maksymalnie 255 znaków.',
    'gatunek.regex' => 'Pole gatunek może zawierać tylko litery i spacje.',
    'wiek.required' => 'Pole wiek jest wymagane.',
    'wiek.integer' => 'Pole wiek musi być liczbą całkowitą.',
    'wiek.min' => 'Pole wiek musi mieć wartość co najmniej 1.',
    'stan_zdrowia.required' => 'Pole stan zdrowia jest wymagane.',
    'stan_zdrowia.string' => 'Pole stan zdrowia musi być ciągiem znaków.',
    'stan_zdrowia.max' => 'Pole stan zdrowia może mieć maksymalnie 255 znaków.',
    'stan_zdrowia.regex' => 'Pole stan zdrowia może zawierać tylko litery i spacje.',
    'rasa.required' => 'Pole rasa jest wymagane.',
    'rasa.string' => 'Pole rasa musi być ciągiem znaków.',
    'rasa.max' => 'Pole rasa może mieć maksymalnie 255 znaków.',
    'rasa.regex' => 'Pole rasa może zawierać tylko litery i spacje.'
    ]);

    $zwierzak = Zwierzaki::findOrFail($id);
    $zwierzak->update($validatedData);

    return redirect()->route('schronisko.show', compact('id'));
}


public function delete($id)
{
    $zwierzak = Zwierzaki::findOrFail($id);
    $zwierzak->delete();

    return redirect()->route('schronisko.zwierzeta')->with('delete', 'Zwierzak został usunięty.');
}


public function search(Request $request)
{
    $search = $request->input('search');
    
    $zwierzaki = Zwierzaki::query(); //użyte aby uzyskac dostep do obiektu wyszukiwania i dodać warkunki

    if ($search) {
        $zwierzaki->where('gatunek', 'LIKE', "%$search%")
                 ->orWhere('wiek', 'LIKE', "%$search%")
                 ->orWhere('stan_zdrowia', 'LIKE', "%$search%")
                 ->orWhere('rasa', 'LIKE', "%$search%");
    }

    $zwierzaki = $zwierzaki->get();
    
    return view('schronisko.search', ['zwierzaki' => $zwierzaki]);
}

//    ADOPCJA
public function adoptuj($id)
{
    // Znajdź zwierzaka po ID
    $zwierzak = Zwierzaki::findOrFail($id);
    
    $zwierzak->user_id = auth()->id();
    $zwierzak->status_adopcji = true;
    $zwierzak->save();
    
    // Przekieruj na widok
    return redirect()->route('schronisko.zaadoptowane')->with('adopt', 'Zwierzak został zaadoptowany.');
}

public function zaadoptowane()
{
   
    $zaadoptowaneZwierzeta = Zwierzaki::where('status_adopcji', true)->get();

    return view('schronisko.zaadoptowane', ['zaadoptowaneZwierzeta' => $zaadoptowaneZwierzeta]);
}


public function usunAdopcje($id)
{
    // Znajdź zaadoptowanego zwierzaka po ID
    $zwierzak = Zwierzaki::findOrFail($id);

    
    
    // Zaktualizuj status adopcji na false (0)
    $zwierzak->status_adopcji = false;
    $zwierzak->save();

    // Przekieruj użytkownika z powiadomieniem o sukcesie
    return redirect()->back()->with('usun', 'Usunięto adopcje zwierzaka');
}

}
