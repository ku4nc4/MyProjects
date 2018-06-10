import React, { Component } from 'react';
import {Link, Route, Switch} from 'react-router-dom';
import logo from './logo.svg';
import './App.css';

const Home = () => {
  return (
    <div>
      <h2>Home</h2>
    </div>
  )
}
const Category = () => {
  return (
    <div>
      <h2>Category</h2>
    </div>
  )
}
const Products = () => {
  return (
    <div>
      <h2>Products</h2>
    </div>
  )
}


class App extends Component {
  render() {
    return (
      <div>
        <nav>
          <ul>
            <li><Link to='/'>Homes</Link></li>
            <li><Link to='/category'>Category</Link></li>
            <li><Link to='/products'>Products</Link></li>
          </ul>
        </nav>
        <Route path='/' exact='true' component={Home}/>
        <Route path='/category' component={Category}/>
        <Route path='/products' component={Products}/>
      </div>
    );
  }
}

export default App;
