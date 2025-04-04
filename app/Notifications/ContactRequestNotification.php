<?php

namespace App\Notifications;

use App\Models\Client;
use App\Models\Commande;
use App\Models\produit;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactRequestNotification extends Notification
{
    use Queueable;

    protected $commande;

    /**
     * Create a new notification instance.
     */
    public function __construct(Commande $commande)
    {
        $this->commande = $commande;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $admin = User::first();
        $clientEmail = $this->commande->client->email; // L'email du client qui a passé la commande
    
        return (new MailMessage)
            ->subject('Nouvelle commande passée')
            ->view('emails.commande_notification', [
                'commande' => $this->commande
            ])
            ->from($admin->email, $admin->name)  // Utilise l'email et le nom de l'admin pour l'expéditeur
            ->replyTo($clientEmail) // Utilise l'email du client pour répondre
            ->cc($admin->email);  // Tu peux ajouter un cc à l'admin, si nécessaire
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
