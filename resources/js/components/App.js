import React from "react";
import ReactDOM from "react-dom";
import { Route, BrowserRouter, Switch } from "react-router-dom";
import Signin from "./auth/Signin/Signin";
import Signup from './auth/Signup/Signup';

function App() {
    return (
        
            <BrowserRouter>
                <Switch>
                    <Route exact path="/" component={Signin} />
                    <Route exact path="/signup" component={Signup} />
                </Switch>
            </BrowserRouter>
        
    );
}

export default App;

if (document.getElementById("root")) {
    ReactDOM.render(<App />, document.getElementById("root"));
}
