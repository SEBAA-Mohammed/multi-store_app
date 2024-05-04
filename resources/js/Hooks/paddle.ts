import { Paddle, initializePaddle } from '@paddle/paddle-js';
import { useEffect, useState } from 'react';
import { useTypedPage } from './typed-page';

export function usePaddle() {
  const [paddle, setPaddle] = useState<Paddle>();
  const { auth } = useTypedPage();

  useEffect(() => {
    initializePaddle({
      environment: process.env.VITE_PADDLE_ENV,
      token: process.env.VITE_PADDLE_CLIENT_SIDE_TOKEN!,
    }).then((paddleInstance: Paddle | undefined) => {
      if (paddleInstance) {
        setPaddle(paddleInstance);
      }
    });
  }, []);

  async function openCheckout(priceId: string) {
    const { user } = auth;

    if (!user?.id) {
      console.error('User not found');
      return;
    }

    paddle?.Checkout.open({
      settings: {
        allowedPaymentMethods: ['paypal', 'apple_pay', 'google_pay', 'card'],
        theme: 'light',
        successUrl: `${window.location.origin}/plans?success=Success Message`,
      },
      items: [{ priceId, quantity: 1 }],
      customer: {
        email: user?.email ?? '',
      },
      customData: {
        user_id: user.id,
      },
    });
  }

  return { openCheckout };
}
