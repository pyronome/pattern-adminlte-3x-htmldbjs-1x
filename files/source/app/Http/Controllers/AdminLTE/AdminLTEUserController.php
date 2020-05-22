<?php

namespace App\Http\Controllers\AdminLTE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminLTE;
use App\AdminLTEUser;

class AdminLTEUserController extends Controller
{

    public $controllerName = 'adminlteuser';

    public function index(Request $request)
    {

        $viewName = ('adminlte.' . $this->controllerName . '_list');

        if (view()->exists('adminlte.custom.' . $this->controllerName . '_list'))
        {
            $viewName = 'adminlte.custom.' . $this->controllerName . '_list';
        } // if (view()->exists('adminlte.custom.' . $this->controllerName . '_list'))

        $adminLTE = new AdminLTE();

        $viewData['controllerName'] = $this->controllerName;
        $viewData['user'] = $adminLTE->getUserData();
        $viewData['customization'] = $adminLTE->getCustomization();
        
        return view($viewName, $viewData);

    }

    public function showDetailPage(Request $request)
    {

        $viewName = ('adminlte.' . $this->controllerName . '_detail');

        if (view()->exists('adminlte.custom.' . $this->controllerName . '_detail'))
        {
            $viewName = 'adminlte.custom.' . $this->controllerName . '_detail';
        } // if (view()->exists('adminlte.custom.' . $this->controllerName . '_detail'))

        $adminLTE = new AdminLTE();

        $viewData['controllerName'] = $this->controllerName;
        $viewData['user'] = $adminLTE->getUserData();
        $viewData['customization'] = $adminLTE->getCustomization();
        
        return view($viewName, $viewData);

    }

    public function showEditPage(Request $request)
    {

        $viewName = ('adminlte.' . $this->controllerName . '_edit');

        if (view()->exists('adminlte.custom.' . $this->controllerName . '_edit'))
        {
            $viewName = 'adminlte.custom.' . $this->controllerName . '_edit';
        } // if (view()->exists('adminlte.custom.' . $this->controllerName . '_edit'))

        $adminLTE = new AdminLTE();

        $viewData['controllerName'] = $this->controllerName;
        $viewData['user'] = $adminLTE->getUserData();
        $viewData['customization'] = $adminLTE->getCustomization();
        
        return view($viewName, $viewData);

    }

    public function showLastUpdated(Request $request)
    {
        $adminLTE = new AdminLTE();
        
        
        if ($request->session()->has(sha1('adminlteuser_lastid')))
        {
            return redirect($adminLTE->getAdminLTEFolder() . $this->controllerName . '/detail/' . $request->session()->get(sha1('adminlteuser_lastid')));
        }
        else
        {
            return redirect($adminLTE->getAdminLTEFolder() . $this->controllerName);
        } // if(isset($_SESSION[sha1('adminlteuser_lastid')]))

    }

}
