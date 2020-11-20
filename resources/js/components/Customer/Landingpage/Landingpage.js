import React from "react";
import { Button } from "@material-ui/core";
import { Link } from "react-router-dom";

function Landingpage() {
    return (
        <>
        <div>
        <h2 style={{textAlign: "center",marginTop:"50px"}}>Customers Relation Management</h2>
        <h4 style={{textAlign: "center",marginTop:"60px"}}>SignUp As Customer</h4>
        </div>
        <div style={{ textAlign: "center",marginTop: "50px" }}>
    
            <Link to ="/signin">
            <Button
                variant="outlined"
                color="primary"
                style={{ textTransform: "none", marginRight: "8px" }}
            >
                Login
            </Button>
            </Link>
            <Link to ="/signup">
            <Button
                variant="outlined"
                color="secondary"
                style={{ textTransform: "none" }}
            >
                Register
            </Button>
            </Link>
        </div>
        </>
    );
}

export default Landingpage;
