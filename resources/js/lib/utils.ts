import { type ClassValue, clsx } from 'clsx';
import { twMerge } from 'tailwind-merge';

import { Product } from '@/types';

export function cn(...inputs: ClassValue[]) {
  return twMerge(clsx(inputs));
}

export const formatter = new Intl.NumberFormat('en-US', {
  style: 'currency',
  currency: 'USD',
});

export function isAbleToCheckout(products: Product[]): boolean {
  if (products.length === 0) return true;

  return products.some(({ product_id, price_id }) => {
    return product_id === null && price_id === null;
  });
}
