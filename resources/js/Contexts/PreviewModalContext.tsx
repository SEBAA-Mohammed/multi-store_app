import { ReactNode, createContext, useContext, useState } from 'react';

import { Product } from '@/types';

interface PreviewModalContextType {
  isOpen: boolean;
  selectedProduct?: Product;
  onOpen: (product: Product) => void;
  onClose: () => void;
}

const PreviewModalContext = createContext<PreviewModalContextType | undefined>(undefined);

export const usePreviewModal = () => {
  const context = useContext(PreviewModalContext);
  if (!context) {
    throw new Error('usePreviewModal must be used within a PreviewModalProvider');
  }
  return context;
};

export function PreviewModalProvider({ children }: { children: ReactNode }) {
  const [isOpen, setIsOpen] = useState(false);
  const [selectedProduct, setSelectedProduct] = useState<Product | undefined>(undefined);

  const onOpen = (product: Product) => {
    setSelectedProduct(product);
    setIsOpen(true);
  };

  const onClose = () => {
    setSelectedProduct(undefined);
    setIsOpen(false);
  };

  return (
    <PreviewModalContext.Provider value={{ isOpen, selectedProduct, onOpen, onClose }}>
      {children}
    </PreviewModalContext.Provider>
  );
}
