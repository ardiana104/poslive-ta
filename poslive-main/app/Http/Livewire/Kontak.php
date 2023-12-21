<?php

namespace App\Http\Livewire;

use App\Models\Kontak as Contact;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class Kontak extends Component
{
    public $nama='';
    public $email='';
    public $pesan='';

    protected $rules = [
        'nama' => 'required|min:3',
        'email' => 'required|email|min:4',
        'pesan' => 'nullable',
    ];

    public function render()
    {
        return view('livewire.kontak')->layout('layouts.masterweb');
    }

    public function store()
    {
        dd('aaa');

        $this->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'pesan' => 'required',
        ]);

        Contact::create([
            'nama' => $this->nama,
            'email' => $this->email,
            'pesan' => $this->pesan,
        ]);

        Mail::send('emails.contact.new', [
            'nama' => $this->nama,
            'email' => $this->email,
            'pesan' => $this->pesan,
        ], function ($message) {
            $message->to('ardipowergame@gmail.com', 'Kopi Mustika Bali')
                    ->subject('New Contact Form Submission');
        });

        session()->flash('success', 'Your message has been sent successfully!');
    }
}
