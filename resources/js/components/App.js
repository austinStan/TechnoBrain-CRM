import React from "react";
import ReactDOM from "react-dom";
import { Route, BrowserRouter, Switch } from "react-router-dom";
import Signin from "./Customer/auth/Signin/Signin";
import Signup from './Customer/auth/Signup/Signup';
import Landingpage from './Customer/Landingpage/Landingpage';
import Main from './Customer/Dashboard/Main';
import '../components/Customer/Dashboard/assets/css/bootstrap.min.css';
import '../components/Customer/Dashboard/assets/css/light-bootstrap-dashboard.css';
import '../components/Customer/Dashboard/assets/css/dashboard.css';


function App() {
    return (
        
            <BrowserRouter>
                <Switch>
                    <Route exact path="/" component={Landingpage} />
                    <Route exact path="/signin" component={Signin} />
                    <Route exact path="/signup" component={Signup} />
                    <Route exact path="/main" component={Main} />

                </Switch>
            </BrowserRouter>
        
    );
}

export default App;

if (document.getElementById("root")) {
    ReactDOM.render(<App />, document.getElementById("root"));
}
