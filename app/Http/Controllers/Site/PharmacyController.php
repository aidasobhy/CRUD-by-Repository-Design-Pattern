<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\PharmacyRequest;
use App\Services\PharmacyService;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
  public $pharmacyService;

  public function __construct(PharmacyService $pharmacyService)
  {
      $this->pharmacyService=$pharmacyService;
  }

  public function index()
  {
      $response=$this->pharmacyService->getAllPharmacies();

      $pharmacies=$response['pharmacies'];

      return view('site.pharmacies.index',compact('pharmacies'));

  }

    public function create()
    {
        return view('site.pharmacies.create');
    }

    public function store(PharmacyRequest $request)
    {
        $data    = $request->validated();
        $product = $this->pharmacyService->createPharmacy($data);
        session()->flash('success', $product['message']);
        return redirect()->route('pharmacies.all');
    }

    public function edit($pharmacyId)
    {
        $response=$this->pharmacyService->getPharmacyById($pharmacyId);

        $pharmacy=$response['pharmacy'];

        if(isset($pharmacy['error']))
        {
            session()->flash('error',$pharmacy['error']);
            return redirect()->route('pharmacies.all');
        }

        return view('site.pharmacies.edit',compact('pharmacy'));
    }

    public function update(PharmacyRequest $request,$pharmacyId)
    {
       $data=$request->validated();
       $data['id']=$pharmacyId;
       $pharmacy=$this->pharmacyService->updatePharmacy($data);

       if(isset($pharmacy['error']))
       {
           session()->flash('error',$pharmacy['error']);
           return redirect()->route('pharmacies.all');
       }

       session()->flash('success',$pharmacy['message']);
        return redirect()->route('pharmacies.all');
    }

    public function delete($pharmacyId)
    {
        $pharmacy=$this->pharmacyService->deletePharmacy($pharmacyId);

        if(isset($pharmacyId['error']))
        {
            session()->flash('error',$pharmacy['error']);
            return redirect()->route('pharmacies.all');
        }


        session()->flash('success',$pharmacy['message']);
        return redirect()->route('pharmacies.all');
    }

    public function showProductsInPharmacy($pharmacyId)
    {
        $response = $this->pharmacyService->showProductInPharmacy($pharmacyId);
        $products = $response['products'];
        return view('site.pharmacies.show_products', compact('products'));
    }

}
