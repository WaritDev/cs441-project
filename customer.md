หน้า customers.tsx

```
import { useState } from "react";
import {
  User,
  MessageCircle,
  Phone,
  Mail,
  MapPin,
  Building,
  ExternalLink,
  Clock,
  TrendingUp,
  Calendar,
  ChevronRight,
  Search,
  Plus,
  Filter,
} from "lucide-react";
import { Button } from "@/components/ui/button";
import { Badge } from "@/components/ui/badge";
import { Input } from "@/components/ui/input";
import { Avatar, AvatarFallback } from "@/components/ui/avatar";
import { cn } from "@/lib/utils";

interface Contact {
  id: string;
  name: string;
  nickname: string;
  lineId: string;
  phone?: string;
  email?: string;
  province: string;
  businessType: string;
  totalValue: number;
  dealsCount: number;
  lastContact: string;
  status: "active" | "inactive" | "new";
  timeline: {
    date: string;
    action: string;
    type: "line" | "call" | "deal" | "note";
  }[];
}

const mockContacts: Contact[] = [
  {
    id: "1",
    name: "คุณสมชาย วงศ์ดี",
    nickname: "เจ",
    lineId: "@somchai_j",
    phone: "081-234-5678",
    email: "somchai@email.com",
    province: "กรุงเทพฯ",
    businessType: "คลินิกความงาม",
    totalValue: 156000,
    dealsCount: 5,
    lastContact: "2 วันที่แล้ว",
    status: "active",
    timeline: [
      { date: "14 ม.ค. 2567", action: "ส่งใบเสนอราคา Spa Package", type: "line" },
      { date: "12 ม.ค. 2567", action: "โทรนัดคุยเรื่องโปรโมชั่น", type: "call" },
      { date: "10 ม.ค. 2567", action: "ปิดดีล Treatment Package", type: "deal" },
      { date: "8 ม.ค. 2567", action: "ทักถามราคาครั้งแรก", type: "line" },
    ],
  },
  {
    id: "2",
    name: "คุณนก ศรีสุข",
    nickname: "นก",
    lineId: "@nok_sri",
    phone: "089-876-5432",
    province: "เชียงใหม่",
    businessType: "ร้านพรีออเดอร์",
    totalValue: 45000,
    dealsCount: 3,
    lastContact: "วานนี้",
    status: "active",
    timeline: [
      { date: "15 ม.ค. 2567", action: "Follow-up เรื่อง Facial", type: "line" },
      { date: "13 ม.ค. 2567", action: "ส่งแค็ตตาล็อกสินค้าใหม่", type: "line" },
    ],
  },
  {
    id: "3",
    name: "คุณมานพ ธุรกิจดี",
    nickname: "พี่หนุ่ม",
    lineId: "@manop_biz",
    phone: "082-345-6789",
    province: "ชลบุรี",
    businessType: "รับเหมาก่อสร้าง",
    totalValue: 520000,
    dealsCount: 2,
    lastContact: "5 วันที่แล้ว",
    status: "inactive",
    timeline: [
      { date: "10 ม.ค. 2567", action: "ส่งใบเสนอราคางานตกแต่ง", type: "line" },
      { date: "5 ม.ค. 2567", action: "ประชุมหน้างาน", type: "note" },
    ],
  },
  {
    id: "4",
    name: "คุณวิภา สวยงาม",
    nickname: "วิ",
    lineId: "@wipa_suay",
    province: "กรุงเทพฯ",
    businessType: "ส่วนตัว",
    totalValue: 12500,
    dealsCount: 4,
    lastContact: "3 วันที่แล้ว",
    status: "active",
    timeline: [
      { date: "12 ม.ค. 2567", action: "แจ้งสินค้าพร้อมส่ง", type: "line" },
    ],
  },
];

const statusStyles = {
  active: "bg-success/10 text-success",
  inactive: "bg-muted text-muted-foreground",
  new: "bg-accent/10 text-accent",
};

const statusLabels = {
  active: "Active",
  inactive: "เงียบ",
  new: "ใหม่",
};

const timelineIcons = {
  line: MessageCircle,
  call: Phone,
  deal: TrendingUp,
  note: Calendar,
};

export default function Contacts() {
  const [selectedContact, setSelectedContact] = useState<Contact | null>(
    mockContacts[0]
  );
  const [searchQuery, setSearchQuery] = useState("");

  const filteredContacts = mockContacts.filter(
    (contact) =>
      contact.name.includes(searchQuery) ||
      contact.nickname.includes(searchQuery) ||
      contact.lineId.includes(searchQuery)
  );

  return (
    <div className="animate-fade-in">
      {/* Header */}
      <div className="mb-6 flex items-center justify-between">
        <div>
          <h1 className="text-2xl font-bold tracking-tight">Contacts</h1>
          <p className="mt-1 text-muted-foreground">
            ลูกค้าทั้งหมด {mockContacts.length} ราย
          </p>
        </div>
        <Button className="line-button gap-2">
          <Plus className="h-4 w-4" />
          เพิ่มลูกค้าใหม่
        </Button>
      </div>

      {/* Search */}
      <div className="mb-6 flex gap-3">
        <div className="relative flex-1">
          <Search className="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-muted-foreground" />
          <Input
            placeholder="ค้นหาชื่อ, ชื่อเล่น, LINE ID..."
            className="pl-10 bg-card"
            value={searchQuery}
            onChange={(e) => setSearchQuery(e.target.value)}
          />
        </div>
        <Button variant="outline" className="gap-2">
          <Filter className="h-4 w-4" />
          Filter
        </Button>
      </div>

      {/* Two Column Layout */}
      <div className="grid gap-6 lg:grid-cols-5">
        {/* Left Column - Contact List */}
        <div className="lg:col-span-2 space-y-2">
          {filteredContacts.map((contact, index) => (
            <div
              key={contact.id}
              onClick={() => setSelectedContact(contact)}
              className={cn(
                "action-card cursor-pointer p-4 transition-all",
                selectedContact?.id === contact.id
                  ? "ring-2 ring-accent shadow-line"
                  : "hover:shadow-md"
              )}
              style={{ animationDelay: `${index * 50}ms` }}
            >
              <div className="flex items-center gap-3">
                <Avatar className="h-12 w-12">
                  <AvatarFallback className="bg-accent/10 text-accent font-semibold">
                    {contact.nickname.slice(0, 2)}
                  </AvatarFallback>
                </Avatar>
                <div className="flex-1 min-w-0">
                  <div className="flex items-center gap-2">
                    <p className="font-medium truncate">{contact.nickname}</p>
                    <Badge className={cn("text-xs", statusStyles[contact.status])}>
                      {statusLabels[contact.status]}
                    </Badge>
                  </div>
                  <p className="text-sm text-muted-foreground truncate">
                    {contact.name}
                  </p>
                </div>
                <ChevronRight className="h-5 w-5 text-muted-foreground shrink-0" />
              </div>
              <div className="mt-3 flex items-center justify-between text-xs text-muted-foreground">
                <span className="flex items-center gap-1">
                  <MessageCircle className="h-3 w-3" />
                  {contact.lineId}
                </span>
                <span className="font-medium text-accent">
                  ฿{contact.totalValue.toLocaleString()}
                </span>
              </div>
            </div>
          ))}
        </div>

        {/* Right Column - Contact Detail */}
        <div className="lg:col-span-3">
          {selectedContact ? (
            <div className="action-card p-6 animate-slide-up">
              {/* Header */}
              <div className="flex items-start justify-between border-b pb-4">
                <div className="flex items-center gap-4">
                  <Avatar className="h-16 w-16">
                    <AvatarFallback className="bg-accent/10 text-accent text-xl font-semibold">
                      {selectedContact.nickname.slice(0, 2)}
                    </AvatarFallback>
                  </Avatar>
                  <div>
                    <div className="flex items-center gap-2">
                      <h2 className="text-xl font-bold">
                        {selectedContact.name}
                      </h2>
                      <Badge
                        className={cn(statusStyles[selectedContact.status])}
                      >
                        {statusLabels[selectedContact.status]}
                      </Badge>
                    </div>
                    <p className="text-muted-foreground">
                      ชื่อเล่น: {selectedContact.nickname}
                    </p>
                  </div>
                </div>
                <Button className="line-button gap-2">
                  <ExternalLink className="h-4 w-4" />
                  Open in LINE
                </Button>
              </div>

              {/* Contact Info Grid */}
              <div className="mt-4 grid grid-cols-2 gap-4">
                <div className="flex items-center gap-3 rounded-lg bg-secondary/50 p-3">
                  <MessageCircle className="h-5 w-5 text-accent" />
                  <div>
                    <p className="text-xs text-muted-foreground">LINE ID</p>
                    <p className="font-medium">{selectedContact.lineId}</p>
                  </div>
                </div>
                {selectedContact.phone && (
                  <div className="flex items-center gap-3 rounded-lg bg-secondary/50 p-3">
                    <Phone className="h-5 w-5 text-muted-foreground" />
                    <div>
                      <p className="text-xs text-muted-foreground">เบอร์โทร</p>
                      <p className="font-medium">{selectedContact.phone}</p>
                    </div>
                  </div>
                )}
                <div className="flex items-center gap-3 rounded-lg bg-secondary/50 p-3">
                  <MapPin className="h-5 w-5 text-muted-foreground" />
                  <div>
                    <p className="text-xs text-muted-foreground">จังหวัด</p>
                    <p className="font-medium">{selectedContact.province}</p>
                  </div>
                </div>
                <div className="flex items-center gap-3 rounded-lg bg-secondary/50 p-3">
                  <Building className="h-5 w-5 text-muted-foreground" />
                  <div>
                    <p className="text-xs text-muted-foreground">ประเภทธุรกิจ</p>
                    <p className="font-medium">{selectedContact.businessType}</p>
                  </div>
                </div>
              </div>

              {/* Stats */}
              <div className="mt-4 grid grid-cols-3 gap-4">
                <div className="rounded-lg border p-4 text-center">
                  <p className="text-2xl font-bold text-accent">
                    ฿{selectedContact.totalValue.toLocaleString()}
                  </p>
                  <p className="mt-1 text-xs text-muted-foreground">
                    ยอดขายรวม
                  </p>
                </div>
                <div className="rounded-lg border p-4 text-center">
                  <p className="text-2xl font-bold">{selectedContact.dealsCount}</p>
                  <p className="mt-1 text-xs text-muted-foreground">
                    จำนวนดีล
                  </p>
                </div>
                <div className="rounded-lg border p-4 text-center">
                  <p className="text-2xl font-bold">{selectedContact.lastContact}</p>
                  <p className="mt-1 text-xs text-muted-foreground">
                    ติดต่อล่าสุด
                  </p>
                </div>
              </div>

              {/* Timeline */}
              <div className="mt-6">
                <h3 className="font-semibold">ประวัติกิจกรรม</h3>
                <div className="mt-3 space-y-3">
                  {selectedContact.timeline.map((item, index) => {
                    const Icon = timelineIcons[item.type];
                    return (
                      <div
                        key={index}
                        className="flex items-start gap-3 rounded-lg bg-secondary/30 p-3"
                      >
                        <div className="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-accent/10">
                          <Icon className="h-4 w-4 text-accent" />
                        </div>
                        <div>
                          <p className="font-medium">{item.action}</p>
                          <p className="mt-0.5 text-xs text-muted-foreground">
                            {item.date}
                          </p>
                        </div>
                      </div>
                    );
                  })}
                </div>
              </div>
            </div>
          ) : (
            <div className="flex h-full items-center justify-center rounded-xl border-2 border-dashed bg-secondary/30 p-12">
              <p className="text-muted-foreground">
                เลือกลูกค้าจากรายการทางซ้าย
              </p>
            </div>
          )}
        </div>
      </div>
    </div>
  );
}

```

badge.tsx

```
import * as React from "react";
import { cva, type VariantProps } from "class-variance-authority";

import { cn } from "@/lib/utils";

const badgeVariants = cva(
  "inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2",
  {
    variants: {
      variant: {
        default: "border-transparent bg-primary text-primary-foreground hover:bg-primary/80",
        secondary: "border-transparent bg-secondary text-secondary-foreground hover:bg-secondary/80",
        destructive: "border-transparent bg-destructive text-destructive-foreground hover:bg-destructive/80",
        outline: "text-foreground",
      },
    },
    defaultVariants: {
      variant: "default",
    },
  },
);

export interface BadgeProps extends React.HTMLAttributes<HTMLDivElement>, VariantProps<typeof badgeVariants> {}

function Badge({ className, variant, ...props }: BadgeProps) {
  return <div className={cn(badgeVariants({ variant }), className)} {...props} />;
}

export { Badge, badgeVariants };
```


button.tsx

```
import * as React from "react";
import { Slot } from "@radix-ui/react-slot";
import { cva, type VariantProps } from "class-variance-authority";

import { cn } from "@/lib/utils";

const buttonVariants = cva(
  "inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0",
  {
    variants: {
      variant: {
        default: "bg-primary text-primary-foreground hover:bg-primary/90",
        destructive: "bg-destructive text-destructive-foreground hover:bg-destructive/90",
        outline: "border border-input bg-background hover:bg-accent hover:text-accent-foreground",
        secondary: "bg-secondary text-secondary-foreground hover:bg-secondary/80",
        ghost: "hover:bg-accent hover:text-accent-foreground",
        link: "text-primary underline-offset-4 hover:underline",
      },
      size: {
        default: "h-10 px-4 py-2",
        sm: "h-9 rounded-md px-3",
        lg: "h-11 rounded-md px-8",
        icon: "h-10 w-10",
      },
    },
    defaultVariants: {
      variant: "default",
      size: "default",
    },
  },
);

export interface ButtonProps
  extends React.ButtonHTMLAttributes<HTMLButtonElement>,
    VariantProps<typeof buttonVariants> {
  asChild?: boolean;
}

const Button = React.forwardRef<HTMLButtonElement, ButtonProps>(
  ({ className, variant, size, asChild = false, ...props }, ref) => {
    const Comp = asChild ? Slot : "button";
    return <Comp className={cn(buttonVariants({ variant, size, className }))} ref={ref} {...props} />;
  },
);
Button.displayName = "Button";

export { Button, buttonVariants };
```

avatar.tsx

```
import * as React from "react";
import * as AvatarPrimitive from "@radix-ui/react-avatar";

import { cn } from "@/lib/utils";

const Avatar = React.forwardRef<
  React.ElementRef<typeof AvatarPrimitive.Root>,
  React.ComponentPropsWithoutRef<typeof AvatarPrimitive.Root>
>(({ className, ...props }, ref) => (
  <AvatarPrimitive.Root
    ref={ref}
    className={cn("relative flex h-10 w-10 shrink-0 overflow-hidden rounded-full", className)}
    {...props}
  />
));
Avatar.displayName = AvatarPrimitive.Root.displayName;

const AvatarImage = React.forwardRef<
  React.ElementRef<typeof AvatarPrimitive.Image>,
  React.ComponentPropsWithoutRef<typeof AvatarPrimitive.Image>
>(({ className, ...props }, ref) => (
  <AvatarPrimitive.Image ref={ref} className={cn("aspect-square h-full w-full", className)} {...props} />
));
AvatarImage.displayName = AvatarPrimitive.Image.displayName;

const AvatarFallback = React.forwardRef<
  React.ElementRef<typeof AvatarPrimitive.Fallback>,
  React.ComponentPropsWithoutRef<typeof AvatarPrimitive.Fallback>
>(({ className, ...props }, ref) => (
  <AvatarPrimitive.Fallback
    ref={ref}
    className={cn("flex h-full w-full items-center justify-center rounded-full bg-muted", className)}
    {...props}
  />
));
AvatarFallback.displayName = AvatarPrimitive.Fallback.displayName;

export { Avatar, AvatarImage, AvatarFallback };

```


input.tsx

```
import * as React from "react";

import { cn } from "@/lib/utils";

const Input = React.forwardRef<HTMLInputElement, React.ComponentProps<"input">>(
  ({ className, type, ...props }, ref) => {
    return (
      <input
        type={type}
        className={cn(
          "flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm",
          className,
        )}
        ref={ref}
        {...props}
      />
    );
  },
);
Input.displayName = "Input";

export { Input };

```

