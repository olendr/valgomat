<?php namespace Valgomat\Http\Controllers;

use Valgomat\Category;
use Valgomat\Http\Requests;
use Valgomat\Http\Controllers\Controller;

use Valgomat\Http\Requests\AdminStoreRequest;
use Valgomat\Opinion;
use Valgomat\Party;
use Illuminate\Http\Request;

class AdminController extends Controller {

    /**
     * Only authorized users
     * can access admin panel
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        /*
         * Get the categories and their opinions
         * with all parties supporting said opinion
         */
        $categories = Category::with(
            [
                'opinions' => function($q) {
                    return $q->with('parties');
                }
            ]
        )->get();

        $parties = Party::all();

        return view('admin.index', compact(['categories', 'parties']));
    }

    public function storeCategory(AdminStoreRequest $request)
    {
        $category = Category::create(
            [
                'name' => $request->input('name')
            ]
        );
        return $this->redirector($category);

    }

    public function storeOpinion(AdminStoreRequest $request)
    {
        $opinion = Opinion::create(
            [
                'content' => $request->input('name')
            ]
        );
        return $this->redirector($opinion);
    }
    public function storeParty(AdminStoreRequest $request)
    {
        $party = Party::create(
            [
                'name' => $request->input('name')
            ]
        );
        return $this->redirector($party);
    }

    private function redirector($object)
    {
        $classArray = explode('\\', get_class($object));
        $className = (end($classArray));

        return redirect()
            ->back()
            ->with('success', 'New ' . $className . ' \'' . $object->name . '\' created.');
    }
}
