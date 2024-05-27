"use client";
import React, { useState, useEffect, useRef } from 'react';
import { FiHome, FiVideo, FiBell, FiMenu } from 'react-icons/fi';
import { BiUser, BiHistory, BiLike } from 'react-icons/bi';

export function Sidebar() {
  const [isOpen, setIsOpen] = useState(false);
  const sidebarRef = useRef<HTMLDivElement>(null);

  const toggleSidebar = () => {
    setIsOpen(!isOpen);
  };

  const handleClickOutside = (event: MouseEvent) => {
    if (sidebarRef.current && !sidebarRef.current.contains(event.target as Node)) {
      setIsOpen(false);
    }
  };

  useEffect(() => {
    document.addEventListener('mousedown', handleClickOutside);
    return () => {
      document.removeEventListener('mousedown', handleClickOutside);
    };
  }, []);

  return (
    <div ref={sidebarRef} className={`flex flex-col h-screen bg-black text-white transition-all duration-300 fixed ${isOpen ? 'w-64' : 'w-20'}`}>
      <div className="flex items-center justify-between px-4 py-3">
        <FiMenu onClick={toggleSidebar} className="cursor-pointer" />
        {isOpen && <span className="text-lg">ViConify</span>}
      </div>
      <nav className="flex-grow px-2">
        <ul className="flex flex-col space-y-2">
          <li className="flex items-center space-x-2 pl-2">
            <FiHome className="text-xl" />
            {isOpen && <span>Home</span>}
          </li>
          <li className="flex items-center space-x-2 pl-2">
            <FiVideo className="text-xl" />
            {isOpen && <span>Shorts</span>}
          </li>
          <li className="flex items-center space-x-2 pl-2">
            <FiBell className="text-xl" />
            {isOpen && <span>Subscriptions</span>}
          </li>
          <li className="flex items-center space-x-2 pl-2">
            <BiUser className="text-xl" />
            {isOpen && <span>You</span>}
          </li>
          <li className="flex items-center space-x-2 pl-2">
            <BiHistory className="text-xl" />
            {isOpen && <span>History</span>}
          </li>
          <li className="flex items-center space-x-2 pl-2">
            <BiLike className="text-xl" />
            {isOpen && <span>Liked Videos</span>}
          </li>
        </ul>
      </nav>
    </div>
  );
}
