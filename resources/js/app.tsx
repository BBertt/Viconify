//react entry point

import React from 'react';
import ReactDOM from 'react-dom';
import { Register } from './components/RegisterReact';
import { Login } from './components/LoginReact';
import { Sidebar } from './components/Sidebar';

const registerElement = document.getElementById('app');
const loginElement = document.getElementById('login');
const sidebarElement = document.getElementById('sidebar');

if (registerElement) {
  ReactDOM.render(
    <React.StrictMode>
      <Register />
    </React.StrictMode>,
    registerElement
  );
}

if (loginElement) {
  ReactDOM.render(
    <React.StrictMode>
      <Login />
    </React.StrictMode>,
    loginElement
  );
}

if (sidebarElement) {
    ReactDOM.render(
      <React.StrictMode>
        <Sidebar />
      </React.StrictMode>,
      sidebarElement
    );
}
