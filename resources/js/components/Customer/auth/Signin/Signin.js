import React from "react";
import {
    Paper,
    withStyles,
    Grid,
    TextField,
    Button,
    FormControlLabel,
    Checkbox,
    CircularProgress
} from "@material-ui/core";
import { Face } from "@material-ui/icons";
import LockIcon from "@material-ui/icons/Lock";
import { Link, Redirect} from "react-router-dom";
const styles = theme => ({
    margin: {
        margin: theme.spacing.unit * 2
    },
    padding: {
        padding: theme.spacing.unit
    }
});

class Signin extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            email: "",
            password: "",
            msg: "",
            isLoading: false,
            redirect: false,
            errMsgEmail: "",
            errMsgPwd: "",
            errMsg: ""
        };
        this.onChangehandler = this.onChangehandler.bind(this);
        this.onSignInHandler = this.onSignInHandler.bind(this);
    }
    onChangehandler = e => {
        let name = e.target.name;
        let value = e.target.value;
        let data = {};
        data[name] = value;
        this.setState(data);
    };
    onSignInHandler = () => {
        this.setState({ isLoading: true });
        axios
            .post("http://localhost:8000/api/user-login", {
                email: this.state.email,
                password: this.state.password
            })
            .then(response => {
                this.setState({ isLoading: false });
                if (response.data.status === 200) {
                    localStorage.setItem("isLoggedIn", true);
                    localStorage.setItem(
                        "userData",
                        JSON.stringify(response.data.data)
                    );
                    this.setState({
                        msg: response.data.message,
                        redirect: true
                    });
                }
                if (
                    response.data.status === "failed" &&
                    response.data.success === undefined
                ) {
                    this.setState({
                        errMsgEmail: response.data.validation_error.email,
                        errMsgPwd: response.data.validation_error.password
                    });
                    setTimeout(() => {
                        this.setState({ errMsgEmail: "", errMsgPwd: "" });
                    }, 2000);
                } else if (
                    response.data.status === "failed" &&
                    response.data.success === false
                ) {
                    this.setState({
                        errMsg: response.data.message
                    });
                    setTimeout(() => {
                        this.setState({ errMsg: "" });
                    }, 2000);
                }
            })
            .catch(error => {
                console.log(error);
            });
    };
    render() {
        if (this.state.redirect) {
            return <Redirect to="/main" />;
        }
        const login = localStorage.getItem("isLoggedIn");
        if (login) {
            return <Redirect to="/main" />;
        }
        const isLoading = this.state.isLoading;
        const { classes } = this.props;
        return (
            <>
                <div>
                    <h2 style={{ textAlign: "center", marginTop: "50px" }}>
                        Customers Relation Management
                    </h2>
                    <h4 style={{ textAlign: "center", marginTop: "60px" }}>
                        SignUp As Customer
                    </h4>
                </div>
                <Paper
                    className={classes.padding}
                    style={{
                        marginLeft: "20%",
                        marginTop: "50px",
                        marginRight: "20%"
                    }}
                >
                     <p className="text-danger">{this.state.errMsg}</p>
                    <div className={classes.margin}>
                        <Grid container spacing={2} alignItems="flex-end">
                            <Grid item>
                                <Face />
                            </Grid>
                            <Grid item md={true} sm={false} xs={false}>
                                <TextField
                                    id="email"
                                    label="Email Address"
                                    name="email"
                                    value={this.state.email}
                                    onChange={this.onChangehandler}
                                    type="email"
                                    fullWidth
                                    autoFocus
                                    required
                                />
                            </Grid>
                        </Grid>
                        <span className="text-danger">{this.state.msg}</span>
                        <span className="text-danger">{this.state.errMsgEmail}</span>
                        <Grid container spacing={2} alignItems="flex-end">
                            <Grid item>
                                <LockIcon />
                            </Grid>
                            <Grid item md={true} sm={false} xs={false}>
                                <TextField
                                    id="password"
                                    label="Password"
                                    name="password"
                                    type="password"
                                    fullWidth
                                    required
                                    value={this.state.password}
                                    onChange={this.onChangehandler}
                                />
                            </Grid>
                            <span className="text-danger">{this.state.errMsgPwd}</span>
                        </Grid>
                        <Grid
                            container
                            justify="center"
                            style={{ marginTop: "10px" }}
                        >
                            <Button
                                variant="outlined"
                                color="primary"
                                style={{
                                    textTransform: "none",
                                    marginRight: "4px"
                                }}
                                onClick={this.onSignInHandler}
                            >
                                Login
                                {isLoading ? (
                                    <CircularProgress/>
                                ) : (
                                    <span></span>
                                )}
                            </Button>
                            <Link to="/">
                                <Button
                                    variant="outlined"
                                    color="secondary"
                                    style={{ textTransform: "none" }}
                                >
                                    Home
                                </Button>
                            </Link>
                        </Grid>
                    </div>
                </Paper>
            </>
        );
    }
}

export default withStyles(styles)(Signin);
