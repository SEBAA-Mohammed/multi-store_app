import { cn } from '@/lib/utils';
import { forwardRef } from 'react';

export interface CartButtonProps extends React.ButtonHTMLAttributes<HTMLButtonElement> {}

export const CartButton = forwardRef<HTMLButtonElement, CartButtonProps>(
  ({ className, children, disabled, type = 'button', ...props }, ref) => {
    return (
      <button
        type={type}
        className={cn(
          `
          w-auto 
          rounded-full 
          bg-black
          border
          border-transparent
          px-5 
          py-3 
          disabled:cursor-not-allowed 
          disabled:opacity-50
          text-white
          font-semibold
          hover:opacity-75
          transition
        `,
          disabled && 'opacity-75 cursor-not-allowed',
          className,
        )}
        disabled={disabled}
        ref={ref}
        {...props}
      >
        {children}
      </button>
    );
  },
);
