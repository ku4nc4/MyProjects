import React, { Component } from 'react';
import Respanel from './Respanel';
import './App.css';
import Buttpanel from './Buttpanel';

class App extends Component {
  state = {
    sum: "0",
  }

  handleClick = buttonName => {
    let suma = this.state.sum;
    if(!isNaN(buttonName)){
      if(suma === "0") suma = buttonName; else suma = `${suma}${buttonName}`;
      this.setState({
        sum : suma,
      });
    } else {
      if(buttonName){

      }
    }
   
  };

  render() {
    return (
      <div className="App">
        <Respanel sum = {this.state.sum}/>
        <Buttpanel clickHandler={this.handleClick}/>
      </div>
    );
  }
}

export default App;
