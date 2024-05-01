import { ReactNode, createContext, useContext, useState } from 'react';

interface PreviewModalContextType {
  isOpen: boolean;
  onOpen: () => void;
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

  const onOpen = () => setIsOpen(true);

  const onClose = () => setIsOpen(false);

  return (
    <PreviewModalContext.Provider value={{ isOpen, onOpen, onClose }}>
      {children}
    </PreviewModalContext.Provider>
  );
}
