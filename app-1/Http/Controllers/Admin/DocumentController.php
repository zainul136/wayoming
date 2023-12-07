<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function index()
    {
        $title = 'Documents';
        $documents = Document::with('order.user')->get();
        return view('admin.document.index', compact('title', 'documents'));
    }

    public function storeDocument(Request $request)
    {
        try {
            $imageName = '';
            if ($request->hasFile('document') && $request->file('document')->isValid()) {
                $imageName = time() . '.' . $request->document->extension();
                $request->document->move(public_path('uploads/document'), $imageName);
                $imageName = 'uploads/document/' . $imageName;


                $doc = new Document();
                $doc->order_id = $request->order_id;
                $doc->document = $imageName;
                $res = $doc->save();

                if ($res) {
                    return back()->with('success_message', 'Document added successfully');
                } else {
                    return back()->with('error_message', 'Failed to save document');
                }
            } else {
                return back()->with('error_message', 'Invalid file uploaded');
            }
        } catch (\Exception $e) {
            return back()->with('error_message', 'An error occurred: ' . $e->getMessage());
        }
    }


}
