export interface User {
  id: number;
  name: string;
  email: string;
  email_verified_at: string;
}

export interface Store {
  id: string;
  name: string;
  slug: string;
  billboard_url: string;
  logo_url: string;
  email: string;
  tel: string;
  adresse: string;
  header: string;
}

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
  auth: {
    user: User;
  };
  current: {
    store: Store;
  };
};
