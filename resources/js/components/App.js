import React from "react";
import ReactDOM from "react-dom";
import { Route, BrowserRouter, Switch,Redirect } from "react-router-dom";
import Signin from "./Customer/auth/Signin/Signin";
import Signup from './Customer/auth/Signup/Signup';
import Landingpage from './Customer/Landingpage/Landingpage';
import Main from './Customer/Dashboard/Main';
import Userprofile from './Customer/Dashboard/Userprofile';
import Dashboard from './Customer/Dashboard/Userprofile';
import '../components/Customer/Dashboard/assets/css/bootstrap.min.css';
import '../components/Customer/Dashboard/assets/css/light-bootstrap-dashboard.css';
import '../components/Customer/Dashboard/assets/css/dashboard.css';
import Sidebar from './Customer/Dashboard/Sidebar';
import Navbar from "./Customer/Dashboard/Navbar";
import Footer from "./Customer/Dashboard/Footer";



function App() {
    return (
        
            <BrowserRouter>
                <Switch>
                    <Route exact path="/" component={Landingpage} />
                    <Route exact path="/signin" component={Signin} />
                    <Route exact path="/signup" component={Signup} />
                    <div className="wrapper">
                    <Sidebar />
                    <Route exact path="/main" component={Main} />
                    <div className="main-panel">
                    <Navbar />
                    <Route exact path="/profile" component={Userprofile} />
                    <Route exact path="/dashboard" component={Dashboard} />
                    <Redirect from='*' to='/dashboard' />
                    <Footer />
                    </div>
                    </div>

                </Switch>
            </BrowserRouter>
        
    );
}

export default App;

if (document.getElementById("root")) {
    ReactDOM.render(<App />, document.getElementById("root"));
}
