import { ReactNode, createContext, useContext } from 'react';

import { useToast } from '@/Components/ui/use-toast';
import { Product } from '@/types';
import useLocalStorage from '@/Hooks/local-storage';

interface CartContextType {
  items: Product[];
  addItem: (data: Product) => void;
  removeItem: (id: number) => void;
  removeAll: () => void;
}

const CartContext = createContext<CartContextType | undefined>(undefined);

export const useCart = () => {
  const context = useContext(CartContext);
  if (!context) {
    throw new Error('useCart must be used within a CartProvider');
  }
  return context;
};

export function CartProvider({ children }: { children: ReactNode }) {
  const [items, setItems] = useLocalStorage<Product[]>('cart-items', []);

  const { toast } = useToast();

  const addItem = (data: Product) => {
    const existingItem = items.find((item) => item.id === data.id);

    if (existingItem) {
      toast({
        title: 'Info:',
        description: 'Item already in cart.',
      });
      return;
    }

    setItems([...items, data]);
    toast({
      title: 'Success',
      description: 'Item added to cart.',
    });
  };

  const removeItem = (id: number) => {
    setItems(items.filter((item) => item.id !== id));
    toast({
      title: 'Success',
      description: 'Item removed from cart.',
    });
  };

  const removeAll = () => {
    setItems([]);
  };

  return (
    <CartContext.Provider value={{ items, addItem, removeItem, removeAll }}>
      {children}
    </CartContext.Provider>
  );
}
