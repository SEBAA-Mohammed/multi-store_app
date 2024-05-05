import { Paddle, initializePaddle, Environments } from '@paddle/paddle-js';
import { useEffect, useState } from 'react';
import { route } from 'ziggy-js';

import { CheckoutEvent, Product, User } from '@/types';

// export enum CheckoutEventNames {
//   CHECKOUT_LOADED = 'checkout.loaded',
//   CHECKOUT_CLOSED = 'checkout.closed',
//   CHECKOUT_UPDATED = 'checkout.updated',
//   CHECKOUT_COMPLETED = 'checkout.completed',
//   CHECKOUT_ERROR = 'checkout.error',
//   CHECKOUT_FAILED = 'checkout.failed',
// }

// export enum CheckoutEventsStatus {
//   DRAFT = 'draft',
//   READY = 'ready',
//   COMPLETED = 'completed',
//   BILLED = 'billed',
//   canceled = 'canceled',
//   PAST_DUE = 'past_due',
// }

export function usePaddle() {
  const [paddle, setPaddle] = useState<Paddle>();
  const [checkoutProcessEvent, setCheckoutProcessEvent] = useState<CheckoutEvent>();

  useEffect(() => {
    initializePaddle({
      environment: import.meta.env.VITE_PADDLE_ENV as Environments,
      token: import.meta.env.VITE_PADDLE_CLIENT_SIDE_TOKEN!,
      eventCallback: function (data) {
        if (data.name === 'checkout.loaded') {
          setCheckoutProcessEvent({ status: 'initialized' });
        }
        if (data.name === 'checkout.error' || data.name === 'checkout.failed') {
          setCheckoutProcessEvent({ status: 'failed', message: data.detail });
        }
        if (data.name === 'checkout.completed') {
          setCheckoutProcessEvent({ status: 'completed' });
        }
      },
    }).then((paddleInstance: Paddle | undefined) => {
      if (paddleInstance) {
        setPaddle(paddleInstance);
      }
    });
  }, [import.meta.env.VITE_PADDLE_ENV, import.meta.env.VITE_PADDLE_CLIENT_SIDE_TOKEN]);

  async function openCheckout(user: User, products: Product[]) {
    const priceIds = products.map((product) => ({ priceId: product.price_id || '' }));

    paddle?.Checkout.open({
      settings: {
        allowedPaymentMethods: ['paypal', 'apple_pay', 'google_pay', 'card'],
        theme: 'light',
        successUrl: route('cart', { _query: { success: true } }),
      },
      items: priceIds,
      customer: {
        email: user.email,
        address: { city: user.ville, countryCode: 'MA', postalCode: user.postal_code },
      },
    });
  }

  return { openCheckout, checkoutProcessEvent };
}
