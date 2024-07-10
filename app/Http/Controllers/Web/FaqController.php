<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    private $view = 'web.faq.';
    /**
     * faq Page
     *
     * @return View
     */
    public function index() : View
    {
        $title = __('web.FAQs');
        $faqs = Faq::withDescription()->cursor();
        return view($this->view . 'index',get_defined_vars());
    }

}
