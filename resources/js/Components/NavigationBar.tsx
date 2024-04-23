import { Link, usePage } from '@inertiajs/react';
import { FC } from 'react';

import { cn } from '@/lib/utils';
import { Category } from '@/types';

interface MainNav {
  data: Category[];
}

export const NavigationBar: FC<MainNav> = ({ data }) => {
  const { url } = usePage();

  const routes = data.map(({ id, name }) => ({
    href: `/category/${id}`,
    label: name,
    active: url === `/category/${id}`,
  }));

  return (
    <nav className="mx-6 flex items-center space-x-4 lg:space-x-6">
      {routes.map(({ href, label, active }) => (
        <Link
          key={href}
          href={href}
          className={cn(
            'transition-colors hover:text-black',
            active ? 'text-black' : 'text-neutral-500',
          )}
        >
          {label}
        </Link>
      ))}
    </nav>
  );
};
