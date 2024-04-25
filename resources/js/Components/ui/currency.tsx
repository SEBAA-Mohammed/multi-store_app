import { cn, formatter } from '@/lib/utils';

interface CurrencyProps {
  value?: string | number;
  className?: string | string[];
}

export const Currency: React.FC<CurrencyProps> = ({ value = 0, className }) => {
  return <p className={cn('font-semibold', className)}>{formatter.format(Number(value))}</p>;
};
