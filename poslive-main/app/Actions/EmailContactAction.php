<?php

namespace App\Actions;

use App\Models\Contact;

use App\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;

class EmailContactAction
{
    public function __invoke(array $formData)
    {
        $contact = $this->getOrCreateContact($formData);
        $this->sendContactToEmail($contact);
    }

    private function getOrCreateContact(array $formData): Contact
    {
        return Contact::firstOrCreate($formData);
    }

    private function sendContactToEmail(Contact $contact): void
    {
        Mail::to(['new-contact-@contact-form.test'])
            ->queue(new ContactMailable($contact));
    }
}