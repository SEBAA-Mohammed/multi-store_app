import { useEffect, FormEventHandler } from 'react';
import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Head, Link, useForm } from '@inertiajs/react';
import { route } from 'ziggy-js';

export default function Register() {
  const { data, setData, post, processing, errors, reset } = useForm({
    name: '',
    adresse: '',
    ville: '',
    tel: '',
    postal_code: '',
    email: '',
    password: '',
    password_confirmation: '',
  });

  useEffect(() => {
    return () => {
      reset('password', 'password_confirmation');
    };
  }, []);

  const submit: FormEventHandler = (e) => {
    e.preventDefault();

    post(route('register'));
  };

  return (
    <GuestLayout>
      <Head title="Register" />

      <form onSubmit={submit}>
        <div>
          <InputLabel htmlFor="name" value="Name" />

          <TextInput
            id="name"
            name="name"
            value={data.name}
            className="mt-1 block w-full"
            autoComplete="name"
            isFocused={true}
            onChange={(e) => setData('name', e.target.value)}
            required
          />

          <InputError message={errors.name} className="mt-2" />
        </div>

        <div>
          <InputLabel htmlFor="adresse" value="Adresse" />

          <TextInput
            id="adresse"
            name="adresse"
            value={data.adresse}
            className="mt-1 block w-full"
            isFocused={true}
            onChange={(e) => setData('adresse', e.target.value)}
            required
          />

          <InputError message={errors.adresse} className="mt-2" />
        </div>

        <div>
          <InputLabel htmlFor="ville" value="Ville" />

          <TextInput
            id="ville"
            name="ville"
            value={data.ville}
            className="mt-1 block w-full"
            isFocused={true}
            onChange={(e) => setData('ville', e.target.value)}
            required
          />

          <InputError message={errors.ville} className="mt-2" />
        </div>

        <div>
          <InputLabel htmlFor="tel" value="Telephone" />

          <TextInput
            type="tel"
            id="tel"
            name="tel"
            value={data.tel}
            className="mt-1 block w-full"
            isFocused={true}
            onChange={(e) => setData('tel', e.target.value)}
            required
          />

          <InputError message={errors.tel} className="mt-2" />
        </div>

        <div>
          <InputLabel htmlFor="postal_code" value="Code Postale" />

          <TextInput
            type="number"
            id="postal_code"
            name="postal_code"
            value={data.postal_code}
            className="mt-1 block w-full"
            isFocused={true}
            onChange={(e) => setData('postal_code', e.target.value)}
            required
          />

          <InputError message={errors.postal_code} className="mt-2" />
        </div>

        <div className="mt-4">
          <InputLabel htmlFor="email" value="Email" />

          <TextInput
            id="email"
            type="email"
            name="email"
            value={data.email}
            className="mt-1 block w-full"
            autoComplete="username"
            onChange={(e) => setData('email', e.target.value)}
            required
          />

          <InputError message={errors.email} className="mt-2" />
        </div>

        <div className="mt-4">
          <InputLabel htmlFor="password" value="Password" />

          <TextInput
            id="password"
            type="password"
            name="password"
            value={data.password}
            className="mt-1 block w-full"
            autoComplete="new-password"
            onChange={(e) => setData('password', e.target.value)}
            required
          />

          <InputError message={errors.password} className="mt-2" />
        </div>

        <div className="mt-4">
          <InputLabel htmlFor="password_confirmation" value="Confirm Password" />

          <TextInput
            id="password_confirmation"
            type="password"
            name="password_confirmation"
            value={data.password_confirmation}
            className="mt-1 block w-full"
            autoComplete="new-password"
            onChange={(e) => setData('password_confirmation', e.target.value)}
            required
          />

          <InputError message={errors.password_confirmation} className="mt-2" />
        </div>

        <div className="flex items-center justify-end mt-4">
          <Link
            href={route('login')}
            className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
          >
            Already registered?
          </Link>

          <PrimaryButton className="ms-4" disabled={processing}>
            Register
          </PrimaryButton>
        </div>
      </form>
    </GuestLayout>
  );
}
