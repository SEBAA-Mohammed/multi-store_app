import { Link } from '@inertiajs/react';
import { route } from 'ziggy-js';

export function Footer() {
  return (
    <footer className="bg-white border-t">
      <div className="mx-auto py-10">
        <p className="text-center text-xs text-black">
          &copy; {new Date().getFullYear().toString()} FakeStoreName, Inc. All right reserved
        </p>
        <Link
          href={route('logout')}
          method="post"
          as="button"
          className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
          Log Out
        </Link>
      </div>
    </footer>
  );
}
