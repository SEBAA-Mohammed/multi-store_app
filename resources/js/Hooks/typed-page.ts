import { usePage } from '@inertiajs/react';
import { InertiaSharedProps } from '@/types';

export function useTypedPage<T = {}>() {
  return usePage<InertiaSharedProps<T>>().props;
}
