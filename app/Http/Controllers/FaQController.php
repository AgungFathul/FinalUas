<?php

namespace App\Http\Controllers;

use App\Models\FaQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;

class FaQController extends Controller
{
    public function indexfaq(Request $request)
    {
        $faqs = FaQ::query();

        if ($request->get('search')) {
            $faqs->where('question', 'LIKE', '%' . $request->get('search') . '%');
        }

        $faqs = $faqs->get();

        return view('indexfaq', compact('faqs', 'request'));
    }

    public function createfaq()
    {
        return view('createfaq');
    }

    public function storefaq(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
        ], [
            'question.required' => 'Question is required.',
            'question.max'      => 'Question may not be greater than 255 characters.',
            'answer.required'   => 'Answer is required.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        FaQ::create([
            'question' => $request->question,
            'answer'   => $request->answer,
        ]);

        return redirect()->route('admin.faq.index')->with('success', 'FAQ created successfully.');
    }

    public function editfaq($id)
    {
        $faq = FaQ::findOrFail($id);
        return view('editfaq', compact('faq'));
    }

    public function updatefaq(Request $request, $id): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
        ], [
            'question.required' => 'Question is required.',
            'question.max'      => 'Question may not be greater than 255 characters.',
            'answer.required'   => 'Answer is required.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $faq = FaQ::findOrFail($id);
        $faq->update([
            'question' => $request->question,
            'answer'   => $request->answer,
        ]);

        return redirect()->route('admin.faq.index')->with('success', 'FAQ updated successfully.');
    }

    public function deletefaq($id): RedirectResponse
    {
        $faq = FaQ::findOrFail($id);
        $faq->delete();

        return redirect()->route('admin.faq.index')->with('success', 'FAQ deleted successfully.');
    }
}
