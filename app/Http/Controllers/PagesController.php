<?php

namespace App\Http\Controllers;


use App\userinscription;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;//ne pas oublié d'utilisé User, Liste et Tache afin de pouvoir intérargir avec la bdd
use App\Liste;
use App\Tache;
use Auth;

class PagesController extends Controller
{
    //sécurité qui permet que si on connait l'url /membre/espace_membre et bah on y a pas acces
   public function __construct(){
        $this->middleware('auth');
    }
    public function  about()
    {
        $title = "A propos";
        return view('pages/about', ['title' => $title]);
    }

    public function  login()
    {
        $title = "Projet Tritri";
        return view('auth/login')->with(['title' => $title]);
    }


    public function  inscription()
    {
        $title = "S'inscrire";
        return view('auth/register')->with(['title' => $title]);
    }

    //espace membre controller
    public function  members()
    {
        $title = "Espace membre";
        $name_liste =  Liste::where('id_users',Auth::user()->id)->get();
        $pseudo_membre = User::where('pseudo', Auth::user()->pseudo)->get();
        return view('/membres/espace_membre')->with(['title' => $title, 'name_liste'=>$name_liste, 'pseudo_membre'=>$pseudo_membre]);

    }
    //espace à propose de l'espace memebre
    public function  about_membre()
    {
        $title = "A propos";
        return view('/membres/about_membre')->with(['title' => $title]);
    }

    public function  liste_tache($id_liste)
    {
        $title = "consultation liste";
        $name_liste =  Liste::where('id_users',Auth::user()->id)->where('id',$id_liste)->get();
        $data_tache = Tache::where('id_users',Auth::user()->id)->where('id_liste',$id_liste)->get(); // récupère les données du bon utilisateur
        return view('/membres/liste_tache')->with(['title' => $title, 'data_tache'=> $data_tache, 'id_liste' => $id_liste, 'name_liste' => $name_liste]);
    }

    public function  tache_edition($id_liste)
    {
        $title = "consultation des tâches";
        $name_liste =  Liste::where('id_users',Auth::user()->id)->get();
        $data_tache = Tache::where('id_users',Auth::user()->id)->where('id_liste',$id_liste)->get();
        return view('/membres/tache_edition')->with(['title' => $title, 'data_tache'=> $data_tache, 'id_liste' => $id_liste, 'name_liste' => $name_liste]);
    }

    public function edit_tache(Request $rq, $id_liste)
    {
        $info = $rq ->all();
        $addTach = new Tache();
        $addTach =  Tache::find($id_liste);
        $addTach -> nom_tache = $info['nom_tache'];
        $addTach -> Description = $info['Description'];
        $addTach -> date_creation = $info['date_creation'];
        $addTach -> accomplissement = $info['accomplissement'];
        $addTach -> update();
        return redirect('membres/liste_tache/'.$id_liste);
    }
    public function  modif_list(Request $rq,$id_liste)
    {
        $info = $rq ->all();
        $todo = new Liste();
        $title = "modifier le nom de la liste";
       $name_liste =  Liste::where('id_users',Auth::user()->id)->get();
        return view('/membres/modif_list')->with(['title' => $title,'name_liste'=>$name_liste,'id_liste'=>$id_liste]);
    }
    public function edit_list(Request $rq,$id_liste)
    {
        $info = $rq ->all();
        $todo = new Liste();
        $id_liste=$id_liste;
        $todo=Liste::find($id_liste);
        //récupère id de users ds la bdd pour savoir a qui appartient la liste
         $todo -> nom_liste = $info['name_liste'];
         $todo -> update();
        return redirect()->action('PagesController@members');
    }

    public function  affichage_list()
    {
        $title = "Ajouter une nouvelle liste";
        $pseudo_membre = User::where('pseudo', Auth::user()->pseudo)->get();
        return view('/membres/ajout_list')->with(['title' => $title,'pseudo_membre'=>$pseudo_membre]);

    }

    public function affichage_tache($id_liste)
    {
        $title = "Ajouter une nouvelle tâche";
        $pseudo_membre = User::where('pseudo', Auth::user()->pseudo)->get();
        return view('/membres/ajout_tache')->with(['title'=>$title,'pseudo_membre'=>$pseudo_membre, 'id_liste'=>$id_liste]);
    }

    public function ajout_list(Request $rq)
    {
        $info = $rq ->all();
        $todo = new Liste();
        //récupère id de users ds la bdd pour savoir a qui appartient la liste
        $todo -> id_users = Auth::user() ->id;
        $todo -> nom_liste = $info['nom_liste'];
        $todo -> save();
        return redirect()->action('PagesController@members');
    }

    public  function ajout_tache(Request $rq, $id_liste)
    {
        $info = $rq ->all();
        $addTach = new Tache();
        $addTach -> id_users = Auth::user() ->id;
        $addTach -> id_liste = $id_liste;
        $addTach -> nom_tache = $info['nom_tache'];
        $addTach -> Description = $info['Description'];
        $addTach -> date_creation = $info['date_creation'];
        $addTach -> accomplissement = $info['accomplissement'];
        $addTach -> save();
        return redirect('membres/liste_tache/'.$id_liste);

    }

    //delete tache
     public function delete($id)
     {
         $tache = new Tache();
         $tache =  Tache::find($id);
        $tache->delete();
        return redirect('/membres/espace_membre');
    }

    //delete liste
    public function delete_liste($id)
    {
        $tache = new Liste();
        $tache =  Liste::find($id);
        $tache->delete();
        return redirect('/membres/espace_membre');
    }

}
