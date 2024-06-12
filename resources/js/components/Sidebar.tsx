"use client";
import React, { useState, useEffect, useRef } from 'react';
import { FiHome, FiVideo, FiBell, FiMenu, FiShoppingBag, FiFilm, FiFileText, FiActivity, FiPlay, FiPlayCircle, FiMessageCircle, FiMessageSquare, FiDollarSign, FiCamera } from 'react-icons/fi';
import { BiUser, BiHistory, BiLike, BiDollarCircle } from 'react-icons/bi';

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

  const handleNavigation = (path: string) => {
    window.location.href = path;
  };

  return (
    <div ref={sidebarRef} className={`flex flex-col h-screen bg-[#E6F5FF] text-black transition-all duration-300 fixed ${isOpen ? 'w-60' : 'w-16'}`}>
      <div className="flex items-center justify-between px-4 py-4">
        <FiMenu onClick={toggleSidebar} className="cursor-pointer text-2xl" />
        {isOpen && <img src="/Assets/ViConifyLogo.png" alt="ViConify Logo" className="h-8" />}
      </div>
      <nav className="flex-grow">
        <ul className="flex flex-col space-y-2">
          <li className="flex items-center space-x-2 rounded-lg hover:bg-[#C1E5FF] cursor-pointer pl-4 pt-4 pb-4" onClick={() => handleNavigation('/')}>
            <div className='flex flex-col justify-center items-center'>
                <FiHome className="text-2xl" />
                <span style={{ fontSize: '0.6rem' }} className={` pt-0.5 ${isOpen ? 'hidden' : 'block'}`}>Home</span>
            </div>
            {isOpen && <span>Home</span>}
          </li>
          <li className="flex items-center space-x-2 rounded-lg hover:bg-[#C1E5FF] cursor-pointer pl-4 pt-4 pb-4" onClick={() => handleNavigation('/videos')}>
            <div className='flex flex-col justify-center items-center'>
                <FiPlayCircle className="text-2xl" />
                <span style={{ fontSize: '0.6rem' }} className={` pt-0.5 ${isOpen ? 'hidden' : 'block'}`}>Videos</span>
            </div>
            {isOpen && <span>Videos</span>}
          </li>
          <li className="flex items-center space-x-2 rounded-lg hover:bg-[#C1E5FF] cursor-pointer pl-4 pt-4 pb-4" onClick={() => handleNavigation('/shorts')}>
            <div className='flex flex-col justify-center items-center'>
                <FiVideo className="text-2xl" />
                <span style={{ fontSize: '0.6rem' }} className={` pt-0.5 ${isOpen ? 'hidden' : 'block'}`}>Shorts</span>
            </div>
            {isOpen && <span>Shorts</span>}
          </li>
          <li className="flex items-center space-x-2 rounded-lg hover:bg-[#C1E5FF] cursor-pointer pl-4 pt-4 pb-4" onClick={() => handleNavigation('/shop')}>
            <div className='flex flex-col justify-center items-center'>
                <FiShoppingBag className="text-2xl" />
                <span style={{ fontSize: '0.6rem' }} className={` pt-0.5 ${isOpen ? 'hidden' : 'block'}`}>Shop</span>
            </div>
            {isOpen && <span>Shop</span>}
          </li>
          <li className="flex items-center space-x-2 rounded-lg hover:bg-[#C1E5FF] cursor-pointer pl-4 pt-4 pb-4" onClick={() => handleNavigation('/posts')}>
            <div className='flex flex-col justify-center items-center'>
                <FiCamera className="text-2xl" />
                <span style={{ fontSize: '0.6rem' }} className={` pt-0.5 ${isOpen ? 'hidden' : 'block'}`}>Post</span>
            </div>
            {isOpen && <span>Post</span>}
          </li>
          <li className="flex items-center space-x-2 rounded-lg hover:bg-[#C1E5FF] cursor-pointer pl-4 pt-4 pb-4" onClick={() => handleNavigation('/chat')}>
            <div className='flex flex-col justify-center items-center'>
                <FiMessageSquare className="text-2xl" />
                <span style={{ fontSize: '0.6rem' }} className={` pt-0.5 ${isOpen ? 'hidden' : 'block'}`}>Chats</span>
            </div>
            {isOpen && <span>Chats</span>}
          </li>
          <li className="flex items-center space-x-2 rounded-lg hover:bg-[#C1E5FF] cursor-pointer pl-4 pt-4 pb-4" onClick={() => handleNavigation('/topup')}>
            <div className='flex flex-col justify-center items-center'>
                <BiDollarCircle className="text-2xl" />
                <span style={{ fontSize: '0.6rem' }} className={` pt-0.5 ${isOpen ? 'hidden' : 'block'}`}>Top up</span>
            </div>
            {isOpen && <span>Top up</span>}
          </li>
        </ul>
      </nav>
    </div>
  );
}
