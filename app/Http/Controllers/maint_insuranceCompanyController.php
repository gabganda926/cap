<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\inscompanyConnection;

use App\addressConnection;

use App\contactPersonConnection;

use App\policynoConnection;

use App\personalInfoConnection;

use Alert;

use Redirect;

class maint_insuranceCompanyController extends Controller
{

	public function __construct(contactPersonConnection $comPerson, inscompanyConnection $comp, addressConnection $add, personalInfoConnection $personalinfo)
    {
        $this->company = $comp;
        $this->address = $add;
				$this->cPerson = $comPerson;
        $this->pinfo = $personalinfo;
    }


	public function index()
    {
      return view('/pages/maintenance/insurance company')
      ->with('cmp',inscompanyConnection::all())
      ->with('pnm',policynoConnection::all())
	  ->with('cpr',contactPersonConnection::all())
      ->with('pInfo',personalInfoConnection::all())
      ->with('add',addressConnection::all());
    }

    public function add_inscomp(Request $req)
	{
        if($req->add_blcknum != null)
        {
          $this->address->add_blcknum = $req->add_blcknum;
        }
        if($req->add_street != null)
        {
          $this->address->add_street = $req->add_street;
        }
        if($req->add_subdivision != null)
        {
          $this->address->add_subdivision = $req->add_subdivision;
        }
        if($req->add_brngy != null)
        {
          $this->address->add_brngy = $req->add_brngy;
        }
        if($req->add_district != null)
        {
          $this->address->add_district = $req->add_district;
        }
        if($req->add_city != null)
        {
          $this->address->add_city = $req->add_city;
        }
        if($req->add_province != null)
        {
          $this->address->add_province = $req->add_province;
        }
        if($req->add_region != null)
        {
          $this->address->add_region = $req->add_region;
        }
        if($req->add_zipcode != null)
        {
          $this->address->add_zipcode = $req->add_zipcode;
        }
        try
	      {
	        $this->address->save();
	        return $this->add_cli_info($req);
		    }
		    catch(\Exception $e)
		    {
		      $message = $e->getCode();
		      if($message == 23000)
		      {
		          alert()
		          ->error('ERROR', 'Data already exist!')
		          ->persistent("Close");

		          return Redirect::back();
		      }
		      else if($message == 22001)
		      {
		        alert()
		        ->error('ERROR', 'Exceed Max limit of column!')
		        ->persistent("Close");

		        return Redirect::back();
		      }
		      else
		      {
		        alert()
		        ->error('ERROR', $e->getCode())
		        ->persistent("Close");

		        return Redirect::back();
		      }
		    }
    }

		public function add_cli_info($req)
	  {
	      if ($req->cPerson_middle_name == null)
	      {
	        $this->pinfo->pinfo_first_name = $req->cPerson_first_name;
	        $this->pinfo->pinfo_last_name = $req->cPerson_last_name;
	      }
	      else
	      {
	        $this->pinfo->pinfo_first_name = $req->cPerson_first_name;
	        $this->pinfo->pinfo_middle_name = $req->cPerson_middle_name;
	        $this->pinfo->pinfo_last_name = $req->cPerson_last_name;
	      }
	      $this->pinfo->pinfo_contact = $req->cPerson_contact;
	      $this->pinfo->pinfo_mail = $req->cPerson_email;
	      try
	      {
	        $this->pinfo->save();
	        return $this->add_cPerson($req);
		    }
		    catch(\Exception $e)
		    {
		      $message = $e->getCode();
		      if($message == 23000)
		      {
		          alert()
		          ->error('ERROR', 'Data already exist!')
		          ->persistent("Close");

		          return Redirect::back();
		      }
		      else if($message == 22001)
		      {
		        alert()
		        ->error('ERROR', 'Exceed Max limit of column!')
		        ->persistent("Close");

		        return Redirect::back();
		      }
		      else
		      {
		        alert()
		        ->error('ERROR', $e->getCode())
		        ->persistent("Close");

		        return Redirect::back();
		      }
		    }
	  }

	  public function add_cPerson($req)
	  {
	      $latestidpinfo = personalInfoConnection::orderBy('pinfo_ID', 'desc')->first();
	      $this->cPerson->personal_info_ID = (int)$latestidpinfo->pinfo_ID;
	      try
        {
          $this->cPerson->save();
          return $this->add_data($req);
		    }
		    catch(\Exception $e)
		    {
		      $message = $e->getCode();
		      if($message == 23000)
		      {
		          alert()
		          ->error('ERROR', 'Data already exist!')
		          ->persistent("Close");

		          return Redirect::back();
		      }
		      else if($message == 22001)
		      {
		        alert()
		        ->error('ERROR', 'Exceed Max limit of column!')
		        ->persistent("Close");

		        return Redirect::back();
		      }
		      else
		      {
		        alert()
		        ->error('ERROR', $e->getCode())
		        ->persistent("Close");

		        return Redirect::back();
		      }
		    }
	  }

     public function add_data($req)
    {
        $latestid = addressConnection::orderBy('add_ID', 'desc')->first();
				$cpersonid = contactPersonConnection::orderBy('cPerson_ID', 'desc')->first();
	    	$this->company->comp_name = $req->comp_name;
        $this->company->comp_add_ID = (int)$latestid->add_ID;
				$this->company->comp_cperson_ID = (int)$cpersonid->cPerson_ID;
	      $mytime = $req->time;
	      $this->company->created_at = $mytime;
	      $this->company->updated_at = $mytime;
				$this->company->del_flag  = 0;

        try
        {
          $this->company->save();
					alert()
		      ->success('Record Saved', 'Success')
		      ->persistent("Close");

		      return Redirect::back();
		    }
		    catch(\Exception $e)
		    {
		      $message = $e->getCode();
		      if($message == 23000)
		      {
		          alert()
		          ->error('ERROR', 'Data already exist!')
		          ->persistent("Close");

		          return Redirect::back();
		      }
		      else if($message == 22001)
		      {
		        alert()
		        ->error('ERROR', 'Exceed Max limit of column!')
		        ->persistent("Close");

		        return Redirect::back();
		      }
		      else
		      {
		        alert()
		        ->error('ERROR', $e->getCode())
		        ->persistent("Close");

		        return Redirect::back();
		      }
		    }
    }

		public function update_inscomp(Request $req)
		{
			$address = addressConnection::where('add_ID', '=', $req->aadd_id)->first();

			if($req->aadd_blcknum != null)
			{
				$address->add_blcknum = $req->aadd_blcknum;
			}
			if($req->aadd_street != null)
			{
				$address->add_street = $req->aadd_street;
			}
			if($req->aadd_subdivision != null)
			{
				$address->add_subdivision = $req->aadd_subdivision;
			}
			if($req->aadd_brngy != null)
			{
				$address->add_brngy = $req->aadd_brngy;
			}
			if($req->aadd_district != null)
			{
				$address->add_district = $req->aadd_district;
			}
			if($req->aadd_city != null)
			{
				$address->add_city = $req->aadd_city;
			}
			if($req->aadd_province != null)
			{
				$address->add_province = $req->aadd_province;
			}
			if($req->aadd_region != null)
			{
				$address->add_region = $req->aadd_region;
			}
			if($req->aadd_zipcode != null)
			{
				$address->add_zipcode = $req->aadd_zipcode;
			}

			try
	      {
	        $address->save();
	        return $this->update_cperson_info($req);
		    }
		    catch(\Exception $e)
		    {
		      $message = $e->getCode();
		      if($message == 23000)
		      {
		          alert()
		          ->error('ERROR', 'Data already exist!')
		          ->persistent("Close");

		          return Redirect::back();
		      }
		      else if($message == 22001)
		      {
		        alert()
		        ->error('ERROR', 'Exceed Max limit of column!')
		        ->persistent("Close");

		        return Redirect::back();
		      }
		      else
		      {
		        alert()
		        ->error('ERROR', $e->getCode())
		        ->persistent("Close");

		        return Redirect::back();
		      }
		    }

		}

	public function update_cperson_info($req)
    {
        $pinfo = personalInfoConnection::where('pinfo_ID','=',$req->pinfo_ID)->first();
        $pinfo->pinfo_first_name = $req->acPerson_first_name;
        $pinfo->pinfo_middle_name = $req->acPerson_middle_name;
        $pinfo->pinfo_last_name = $req->acPerson_last_name;
        $pinfo->pinfo_contact = $req->acPerson_contact;
        $pinfo->pinfo_mail = $req->acPerson_email;
        try
	      {
	        $pinfo->save();
	        return $this->update_data($req);
		    }
		    catch(\Exception $e)
		    {
		      $message = $e->getCode();
		      if($message == 23000)
		      {
		          alert()
		          ->error('ERROR', 'Data already exist!')
		          ->persistent("Close");

		          return Redirect::back();
		      }
		      else if($message == 22001)
		      {
		        alert()
		        ->error('ERROR', 'Exceed Max limit of column!')
		        ->persistent("Close");

		        return Redirect::back();
		      }
		      else
		      {
		        alert()
		        ->error('ERROR', $e->getCode())
		        ->persistent("Close");

		        return Redirect::back();
		      }
		    }
    }

	public function update_data($req)
	{
		$compy = inscompanyConnection::where('comp_ID', '=', $req->acopid)->first();

		$compy->comp_name = $req->acomp_name;
    $mytime = $req->atime;
    $compy->updated_at = $mytime;

		try
    {
      $compy->save();
			alert()
      ->success('Record Updated', 'Success')
      ->persistent("Close");

      return Redirect::back();
    }
    catch(\Exception $e)
    {
      $message = $e->getCode();
      if($message == 23000)
      {
          alert()
          ->error('ERROR', 'Data already exist!')
          ->persistent("Close");

          return Redirect::back();
      }
      else if($message == 22001)
      {
        alert()
        ->error('ERROR', 'Exceed Max limit of column!')
        ->persistent("Close");

        return Redirect::back();
      }
      else
      {
        alert()
        ->error('ERROR', $e->getCode())
        ->persistent("Close");

        return Redirect::back();
      }
    }

	}

	public function delete_inscomp(Request $req)
	{
		$compy = inscompanyConnection::where('comp_ID', '=', $req->acopid)->first();

		$compy->del_flag = 1;
    $mytime = $req->atime;
    $compy->updated_at = $mytime;

		try
    {
      $compy->save();
			alert()
      ->success('Record Deleted', 'Success')
      ->persistent("Close");

      return Redirect::back();
    }
    catch(\Exception $e)
    {
      $message = $e->getCode();
      if($message == 23000)
      {
          alert()
          ->error('ERROR', 'Data already exist!')
          ->persistent("Close");

          return Redirect::back();
      }
      else if($message == 22001)
      {
        alert()
        ->error('ERROR', 'Exceed Max limit of column!')
        ->persistent("Close");

        return Redirect::back();
      }
      else
      {
        alert()
        ->error('ERROR', $e->getCode())
        ->persistent("Close");

        return Redirect::back();
      }
    }
	}

	public function ardelete_inscomp(Request $req)
	{
      foreach($req->asd as $ID)
      {
				$compy = inscompanyConnection::where('comp_ID', '=', $ID)->first();

				$compy->del_flag = 1;
    		$mytime = $req->time;
    		$compy->updated_at = $mytime;

				$compy->save();
      }
	}
}
