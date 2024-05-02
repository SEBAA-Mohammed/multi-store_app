import { ReactElement, cloneElement, useState } from 'react';
import { Star, StarHalf } from 'lucide-react';

interface RatingProps {
  value: number;
  count?: number;
  className?: string;
  color?: string;
  hoverColor?: string;
  activeColor?: string;
  size?: number;
  edit?: boolean;
  isHalf?: boolean;
  onChange?: (value: number) => void;
  emptyIcon?: ReactElement;
  halfIcon?: ReactElement;
  fullIcon?: ReactElement;
}

export function Rating({
  className,
  value,
  count = 5,
  color = '#ffd700',
  hoverColor = '#ffc107',
  activeColor = '#ffc107',
  size = 30,
  edit = false,
  isHalf = true,
  onChange,
  emptyIcon = <Star size={4} />,
  halfIcon = <StarHalf />,
  fullIcon = <Star fill="#ffc107" />,
}: RatingProps) {
  const [hoverValue, setHoverValue] = useState<number | undefined>(undefined);

  const handleMouseMove = (index: number) => {
    if (!edit) {
      return;
    }
    setHoverValue(index);
  };

  const handleMouseLeave = () => {
    if (!edit) {
      return;
    }
    setHoverValue(undefined);
  };

  const handleClick = (index: number) => {
    if (!edit) {
      return;
    }
    if (onChange) {
      onChange(index + 1);
    }
  };

  const stars = [];

  for (let i = 0; i < count; i++) {
    let star: ReactElement;
    if (isHalf && value - i > 0 && value - i < 1) {
      star = halfIcon;
    } else if (i < value) {
      star = fullIcon;
    } else {
      star = emptyIcon;
    }

    if (hoverValue !== undefined) {
      if (i <= hoverValue) {
        star = fullIcon;
      }
    }

    stars.push(
      <div
        key={i}
        style={{ cursor: 'pointer' }}
        onMouseMove={() => handleMouseMove(i)}
        onMouseLeave={handleMouseLeave}
        onClick={() => handleClick(i)}
      >
        {cloneElement(star, {
          size: size,
          color: i <= Number(hoverValue) ? hoverColor : i < value ? activeColor : color,
        })}
      </div>,
    );
  }

  return <div className="flex">{stars}</div>;
}
