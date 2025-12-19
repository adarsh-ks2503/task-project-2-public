<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function preview(Request $request){
        $data = $request->validate([
            'selection_status' => 'required|in:selected,rejected',
            'candidate_name' => 'required|string',
            'candidate_email' => 'required|email',
            'position_applied' => 'required|string'
        ]);
        $preview = $this->emailPreview(
            $data['selection_status'],
            $data['candidate_name'],
            $data['position_applied']
        );
        return view('preview', compact('preview', 'data'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'candidate_email' => 'required|email',
            'email_body' => 'required|string',
        ]);

        try {
            Mail::raw($request->email_body, function ($message) use ($request) {
                $message->to($request->candidate_email)
                        ->subject('Job Application Update');
            });

            return redirect('/')
                ->with('success', 'Email sent successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send email. Please try again.');
        }
    }

    private function emailPreview($status, $name, $position){
        if($status === 'selected'){
            return "Dear {$name},

We are pleased to inform you that you have been selected for the position of {$position}.

Please reply to this email to confirm your acceptance.

Best regards,
HR Team";
        }
        else{
            return "Dear {$name},

Thank you for applying for the position of {$position}.

We regret to inform you that we have decided to move forward with other candidates.

Best regards,
HR Team";
        }
    }
}
