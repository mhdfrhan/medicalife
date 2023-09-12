<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderConfirmed extends Notification
{
	use Queueable;

	public $invoiceNumber;

	/**
	 * Create a new notification instance.
	 *
	 * @param string $invoiceNumber
	 */
	public function __construct($invoiceNumber)
	{
		$this->invoiceNumber = $invoiceNumber;
	}

	/**
	 * Get the notification's delivery channels.
	 *
	 * @param  mixed  $notifiable
	 * @return array<int, string>
	 */
	public function via($notifiable): array
	{
		return ['mail'];
	}

	/**
	 * Get the mail representation of the notification.
	 *
	 * @param  mixed  $notifiable
	 * @return MailMessage
	 */
	public function toMail($notifiable): MailMessage
	{
		return (new MailMessage)
			->subject('Pesanan Baru')
			->line('Hai, ada pesanan baru nih dengan invoice ' . $this->invoiceNumber . '.')
			->action('Lihat Detail Pesanan', url(route('detail.order', strtolower($this->invoiceNumber))));
	}

	/**
	 * Get the array representation of the notification.
	 *
	 * @param  mixed  $notifiable
	 * @return array<string, mixed>
	 */
	public function toArray($notifiable): array
	{
		return [
			//
		];
	}
}
