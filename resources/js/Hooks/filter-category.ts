import { router } from '@inertiajs/react';
import { route } from 'ziggy-js';

interface QueryProps {
  [queryKey: string]: number;
}

export function useFilterCategory(queryKey: string) {
  const categoryId = route().params.category as string;

  if (!route().has('category')) {
    throw new Error('Make sure you are using this hook inside category page');
  }

  const selectedValue = parseInt(route().params[queryKey] as string);

  function onClick(queryObj: QueryProps): void {
    return router.visit(
      route('category', {
        category: categoryId,
        _query: queryObj,
      }),
      { preserveScroll: true, replace: true },
    );
  }

  return { onClick, selectedValue };
}
