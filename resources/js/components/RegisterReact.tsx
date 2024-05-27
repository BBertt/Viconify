"use client";
import React, { useEffect, useState } from "react";
import { Label } from "./ui/label";
import { Input } from "./ui/input";
import { cn } from "../utils/cn";
import { FlipWords } from "./ui/flip-words";
import {
  IconBrandGithub,
  IconBrandGmail,
} from "@tabler/icons-react";

export function Register() {
  const words = ["Entertainment", "Community", "Videos", "Shopping"];
  const [csrfToken, setCsrfToken] = useState<string | null>(null);
  const [errors, setErrors] = useState<{ [key: string]: string }>({});

  useEffect(() => {
    const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
    setCsrfToken(token ?? '');
  }, []);

  const handleSubmit = async (e: React.FormEvent<HTMLFormElement>) => {
    e.preventDefault();
    const formData = new FormData(e.currentTarget);
    const newErrors: { [key: string]: string } = {};

    const data = {
      username: formData.get('username'),
      email: formData.get('email'),
      password: formData.get('password'),
      password_confirmation: formData.get('retypepassword'),
      phonenumber: formData.get('phonenumber'),
      homeaddress: formData.get('homeaddress'),
      _token: csrfToken,
    };

    if (!data.username) newErrors.username = "Username is required";
    if (!data.email) newErrors.email = "Email is required";
    if (!data.password) newErrors.password = "Password is required";
    if (data.password !== data.password_confirmation) {
      newErrors.password_confirmation = "Passwords do not match";
    }
    if (!data.phonenumber) newErrors.phonenumber = "Phone number is required";
    if (!data.homeaddress) newErrors.homeaddress = "Home address is required";

    if (Object.keys(newErrors).length > 0) {
      setErrors(newErrors);
      return;
    }

    try {
      const response = await fetch('/register', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': csrfToken || '',
        },
        body: JSON.stringify(data),
      });

      if (response.ok) {
        const result = await response.json();
        console.log('Registration successful', result);
        setErrors({});
        window.location.href = "/login";
      } else {
        const errorText = await response.text();
        console.error('Registration failed', errorText);
      }
    } catch (error) {
      console.error('An error occurred:', error);
    }
  };

  return (
    <div className="min-h-screen flex items-center justify-center bg-fixed bg-center bg-cover" style={{ backgroundImage: "url('/Assets/Login/BGImg.jpg')" }}>
        <div className="max-w-md w-full mx-auto rounded-none md:rounded-2xl p-0 md:p-8 shadow-input backdrop-blur-sm bg-white/70 dark:bg-black flex flex-row">
            <div className="w-[200rem]">
                <h2 className="font-bold text-xl text-neutral-800 dark:text-neutral-200">
                    Welcome to ViConify
                </h2>
                <div className="text-sm mx-px font-normal text-neutral-600 dark:text-neutral-400">
                    Register to ViConify and enjoy your<FlipWords words={words} /> <br />
                </div>
                <form
                className="my-6"
                action="/register"
                method="POST"
                onSubmit={handleSubmit}
                >
                {/* CSRF Token */}
                {csrfToken && <input type="hidden" name="_token" value={csrfToken} />}

                <LabelInputContainer className="mb-4">
                    <Label htmlFor="username">Username</Label>
                    <Input
                      id="username"
                      name="username"
                      placeholder="Username"
                      type="text"
                      className={cn("bg-white/80", { "border-red-500": errors.username })}
                    />
                    {errors.username && <p className="text-red-500 text-sm">{errors.username}</p>}
                </LabelInputContainer>
                <LabelInputContainer className="mb-4">
                    <Label htmlFor="email">Email Address</Label>
                    <Input
                      id="email"
                      name="email"
                      placeholder="Email@gmail.com"
                      type="email"
                      className={cn("bg-white/80", { "border-red-500": errors.email })}
                    />
                    {errors.email && <p className="text-red-500 text-sm">{errors.email}</p>}
                </LabelInputContainer>
                <LabelInputContainer className="mb-4">
                    <Label htmlFor="password">Password</Label>
                    <Input
                      id="password"
                      name="password"
                      placeholder="••••••••"
                      type="password"
                      className={cn("bg-white/80", { "border-red-500": errors.password })}
                    />
                    {errors.password && <p className="text-red-500 text-sm">{errors.password}</p>}
                </LabelInputContainer>
                <LabelInputContainer className="mb-4">
                    <Label htmlFor="retypepassword">Confirm Password</Label>
                    <Input
                      id="retypepassword"
                      name="retypepassword"
                      placeholder="••••••••"
                      type="password"
                      className={cn("bg-white/80", { "border-red-500": errors.password_confirmation })}
                    />
                    {errors.password_confirmation && <p className="text-red-500 text-sm">{errors.password_confirmation}</p>}
                </LabelInputContainer>
                <LabelInputContainer className="mb-4">
                    <Label htmlFor="phonenumber">Phone Number</Label>
                    <Input
                      id="phonenumber"
                      name="phonenumber"
                      placeholder="081x xxxx xxxx"
                      type="text"
                      className={cn("bg-white/80", { "border-red-500": errors.phonenumber })}
                    />
                    {errors.phonenumber && <p className="text-red-500 text-sm">{errors.phonenumber}</p>}
                </LabelInputContainer>
                <LabelInputContainer className="mb-8">
                    <Label htmlFor="homeaddress">Home Address</Label>
                    <Input
                      id="homeaddress"
                      name="homeaddress"
                      placeholder="Home Address"
                      type="text"
                      className={cn("bg-white/80", { "border-red-500": errors.homeaddress })}
                    />
                    {errors.homeaddress && <p className="text-red-500 text-sm">{errors.homeaddress}</p>}
                </LabelInputContainer>

                <button
                    className="bg-gradient-to-br relative group/btn from-black dark:from-zinc-900 dark:to-zinc-900 to-neutral-600 block dark:bg-zinc-800 w-full text-white rounded-md h-10 font-medium shadow-[0px_1px_0px_0px_#ffffff40_inset,0px_-1px_0px_0px_#ffffff40_inset] dark:shadow-[0px_1px_0px_0px_var(--zinc-800)_inset,0px_-1px_0px_0px_var(--zinc-800)_inset]"
                    type="submit"
                >
                    Sign up &rarr;
                    <BottomGradient />
                </button>

                <div className="bg-gradient-to-r from-transparent via-neutral-300 dark:via-neutral-700 to-transparent my-8 h-[1px] w-full" />

                <div className="flex flex-col space-y-4">
                    <button
                    className="relative group/btn flex space-x-2 items-center justify-start px-4 w-full text-black rounded-md h-10 font-medium shadow-input bg-gray-50 dark:bg-zinc-900 dark:shadow-[0px_0px_1px_1px_var(--neutral-800)]"
                    type="button"
                    onClick={() => window.location.href = '/login'}
                    >
                    <IconBrandGmail className="h-4 w-4 text-neutral-800 dark:text-neutral-300" />
                    <span className="text-neutral-700 dark:text-neutral-300 text-sm">
                        Login
                    </span>
                    <BottomGradient />
                    </button>
                    <button
                    className="relative group/btn flex space-x-2 items-center justify-start px-4 w-full text-black rounded-md h-10 font-medium shadow-input bg-gray-50 dark:bg-zinc-900 dark:shadow-[0px_0px_1px_1px_var(--neutral-800)]"
                    type="button"
                    >
                    <IconBrandGithub className="h-4 w-4 text-neutral-800 dark:text-neutral-300" />
                    <span className="text-neutral-700 dark:text-neutral-300 text-sm">
                        GitHub
                    </span>
                    <BottomGradient />
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
  );
}

const BottomGradient = () => {
  return (
    <>
      <span className="group-hover/btn:opacity-100 block transition duration-500 opacity-0 absolute h-0.5 w-full -bottom-px inset-x-0 bg-gradient-to-r from-transparent via-cyan-500 to-transparent" />
      <span className="group-hover/btn:opacity-100 blur-sm block transition duration-500 opacity-0 absolute h-0.5 w-1/2 mx-auto -bottom-px inset-x-10 bg-gradient-to-r from-transparent via-indigo-500 to-transparent" />
    </>
  );
};

const LabelInputContainer = ({
  children,
  className,
}: {
  children: React.ReactNode;
  className?: string;
}) => {
  return (
    <div className={cn("flex flex-col space-y-2 w-full", className)}>
      {children}
    </div>
  );
};
