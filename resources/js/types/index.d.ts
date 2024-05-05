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
  url: string;
  store_id: number;
}

export interface Brand {
  id: number;
  name: string;
  logo: string;
}

export interface Unit {
  id: number;
  name: string;
}

export interface Product {
  id: number;
  barcode: string;
  designation: string;
  prix_ht: number;
  tva: number;
  price: number;
  description: string;
  stock: number;
  rating: number;
  product_id?: string;
  price_id?: string;
  images: ProductImage[];
  category: Category;
  brand?: Brand;
  unit?: Unit;
  store?: Store;
}

export interface ProductImage {
  id: number;
  url: string;
}

export interface Auth {
  user: User;
}

export interface CheckoutEvent {
  status: 'initialized' | 'failed' | 'completed';
  message?: string;
}

export type InertiaSharedProps<T = {}> = T & {
  auth: Auth;
  current: {
    store: Store;
    categories: Category[];
  };
};
