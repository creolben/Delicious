<?php

namespace App\Http\Controllers;
use App;
use input;
use App\Calendar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\recipeSearch;
class EventController extends Controller
{
  
  public function index()
    {
          $c = new \App\myCalendar;
          $calendar =  $c->create();
        return view('home', compact('calendar'));
      }
    
  Public function search(Request $request){
   echo "hit";
   $c = new \App\myCalendar;
   $calendar = $c->create();
   if ($request->has('recipe'))
    {
//
    $searchValues = $request->input('recipe');
    }
  else
  {
    $searchValues = 'chicken';
  }
    $base = rawurlencode("GET")."&";
    $base .= "http%3A%2F%2Fplatform.fatsecret.com%2Frest%2Fserver.api&";

    //sort params by abc....necessary to build a correct unique signature
    $params = "method=foods.search&";
    $params .= "oauth_consumer_key=bc0b325e7002466381072801eb397a2a&"; // ur consumer key
    $params .= "oauth_nonce=123&";
    $params .= "oauth_signature_method=HMAC-SHA1&";
    $params .= "oauth_timestamp=".time()."&";
    $params .= "oauth_version=1.0&";
    $params .= "search_expression=".urlencode($searchValues);
    $params2 = rawurlencode($params);
    $base .= $params2;

    //encrypt it!
    $sig= base64_encode(hash_hmac('sha1', $base, "c241b5e51c644dc69073ce7f9da45d7c&", true)); // replace xxx with Consumer Secret


    //now get the search results and write them down
    $url = "http://platform.fatsecret.com/rest/server.api?".$params."&oauth_signature=".rawurlencode($sig);

    $food_feed = file_get_contents($url);
    echo $food_feed;
    return response()->json(['listOfId' => $searchValues]);
  // $search = "http://food2fork.com/api/search?key=f1a5ea67b861428fa53fd5ee48e46386&q=";
  // $search .= $searchValues;
  // $jsonSearchContent = file_get_contents($search);
  // $jfo = json_decode($jsonSearchContent);
  // $listOfRecipes = $jfo->recipes;

  // $listOfRecipesId = array();
  // $listOfRecipesTitle = array();
  // $listOfRecipesImage = array();
  // $listOfsource_url = array();
  // $max = sizeof($listOfRecipes);
  
  //   for($i=0; $i<$max ;$i++)
  //   {
      
  //     array_push($listOfRecipesId, $listOfRecipes[$i]->recipe_id);
  //     array_push($listOfRecipesTitle, $listOfRecipes[$i]->title);
  //     array_push($listOfRecipesImage, $listOfRecipes[$i]->image_url);
  //     array_push($listOfsource_url , $listOfRecipes[$i]->source_url);
  //   }

  //   return response()->json(['listOfId' => $listOfRecipesId,'listOfTitle' => $listOfRecipesTitle, 'listOfImages' => $listOfRecipesImage,'listOfUrls' =>$listOfsource_url]);
     
    
  //return view('main_page', compact('calendar'));
   }
  public function create(Request $request)
    {
     
       $e =  new \App\EventModel;
       $e->title = $request->title;
       $e->full_day = true;
       $e->start_time = $request->start_time;
       $e->end_time = $request->end_time;
       $e->save();
       $events = \App\EventModel::all();
       return response()->json(['events' => $events]);
    }
  
  public function edit($id)
    {
     return view('event/edit', ['event' => Event::findOrFail($id)]);
    }
  public function update(Request $request)
    {
      if ($request->has('start_time')){
        $title = $request->title;
      $id = $request->id;
      $start_time = $request->start_time;
      $end_time = $request->end_time;
      $e = \App\EventModel::find($request->id);
      $e->start_time = $start_time;
      $e->end_time = $end_time;
      $e->save();
      }
      
    }
  public function destroy(Request $request)
    {
        if ($request){
       $event = \App\EventModel::findOrFail($request->id);
       $event->delete();
       return response()->json(['event' => $event]);
      }
    }
  Public function test(){
    $events = \App\EventModel::all();
    //return $events;
    return view('test',compact('events'));
  }
  Public function feed(){
    $events = \App\EventModel::all();
    return $events;
    
  }
}
