export interface User {
  id: number;
  name: string;
  username: string;
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

export interface Category {
  id: number;
  name: string;
  image_url: string;
}

export interface Product {
  id: number;
  barcode: string;
  designation: string;
  prix_ht: number;
  tva: number;
  description: string;
  stock: number;
  rating: number;
  // category: CategoryResource | null;
  // brand: BrandResource | null;
  // unit: UnitResource | null;
  // store: StoreResource | null;
}

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
  auth: {
    user: User;
  };
  current: {
    store: Store;
    categories: Category[];
  };
};
