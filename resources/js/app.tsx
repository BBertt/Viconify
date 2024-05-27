//react entry point

import React from 'react';
import ReactDOM from 'react-dom/client';
import { Register } from './components/RegisterReact';
import { Login } from './components/LoginReact';
import { Sidebar } from './components/Sidebar';

const registerElement = document.getElementById('app');
const loginElement = document.getElementById('login');
const sidebarElement = document.getElementById('sidebar');

if (registerElement) {
    const registerRoot = ReactDOM.createRoot(registerElement);
    registerRoot.render(
      <React.StrictMode>
        <Register />
      </React.StrictMode>
    );
  }

if (loginElement) {
    const loginRoot = ReactDOM.createRoot(loginElement);
    loginRoot.render(
        <React.StrictMode>
        <Login />
        </React.StrictMode>
    );
}

if (sidebarElement) {
    const sidebarRoot = ReactDOM.createRoot(sidebarElement);
    sidebarRoot.render(
        <React.StrictMode>
        <Sidebar />
        </React.StrictMode>
    );
}
