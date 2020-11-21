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
import EmailIcon from "@material-ui/icons/Email";
import LockIcon from "@material-ui/icons/Lock";
import "bootstrap/dist/css/bootstrap.css";
import {
    Face,
    Fingerprint,
    FormatListBulletedRounded
} from "@material-ui/icons";
import { Link } from "react-router-dom";
const styles = theme => ({
    margin: {
        margin: theme.spacing.unit * 2
    },
    padding: {
        padding: theme.spacing.unit
    }
});

class Signup extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            signupData: {
                name: "",
                email: "",
                password: "",
                isLoading: ""
            },
            msg: "",
         

        };
        this.onChangehandler = this.onChangehandler.bind(this);
        this.onSubmitHandler = this.onSubmitHandler.bind(this);
    }

    onChangehandler = (e, key) => {
        const { signupData } = this.state;
        signupData[e.target.name] = e.target.value;
        console.log(signupData);
        this.setState({ signupData });
    };
    onSubmitHandler = e => {
        e.preventDefault();
        this.setState({ isLoading: true });
        axios
            .post(
                "http://localhost:8000/api/user-signup",
                this.state.signupData
            )
            .then(response => {
                this.setState({ isLoading: false });
                if (response.data.status === 200) {
                    this.setState({
                        msg: response.data.message,
                        signupData: {
                            name: "",
                            email: "",
                            password: ""
                        }
                    });
                    setTimeout(() => {
                        this.setState({ msg: "" });
                    }, 2000);
                }

                if (response.data.status === "failed") {
                    this.setState({ msg: response.data.message });
                    setTimeout(() => {
                        this.setState({ msg: "" });
                    }, 2000);
                }
            });
    };
    render() {
        const { classes } = this.props;
        const isLoading = this.state.isLoading;
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
                    <div className='text-danger'>
                    {this.state.msg}
                    </div>
                    <div className={classes.margin}>
                        <Grid container spacing={3} alignItems="flex-end">
                            <Grid item>
                                <Face />
                            </Grid>
                            <Grid item md={true} sm={false} xs={false}>
                                <TextField
                                    id="name"
                                    label="Name"
                                    type="name"
                                    name="name"
                                    fullWidth
                                    autoFocus
                                    required
                                    value={this.state.signupData.name}
                                    onChange={this.onChangehandler}
                                />
                            </Grid>
                        </Grid>
                        <Grid container spacing={3} alignItems="flex-end">
                            <Grid item>
                                <EmailIcon />
                            </Grid>
                            <Grid
                                item
                                md={true}
                                sm={false}
                                xs={FormatListBulletedRounded}
                            >
                                <TextField
                                    id="email"
                                    label="Email Address"
                                    type="email"
                                    name="email"
                                    fullWidth
                                    required
                                    value={this.state.signupData.email}
                                    onChange={this.onChangehandler}
                                />
                            </Grid>
                        </Grid>
                        <Grid container spacing={3} alignItems="flex-end">
                            <Grid item>
                                <LockIcon />
                            </Grid>
                            <Grid item md={true} sm={false} xs={false}>
                                <TextField
                                    id="password"
                                    label="Password"
                                    type="Password"
                                    name="password"
                                    fullWidth
                                    required
                                    value={this.state.signupData.password}
                                    onChange={this.onChangehandler}
                                />
                            </Grid>
                        </Grid>
                        <Grid
                            container
                            alignItems="center"
                            justify="space-between"
                        >
                            <Grid item>
                                <FormControlLabel
                                    control={<Checkbox color="primary" />}
                                    label="Remember me"
                                />
                            </Grid>
                            <Grid item>
                                <Button
                                    disableFocusRipple
                                    disableRipple
                                    style={{ textTransform: "none" }}
                                    variant="text"
                                    color="primary"
                                >
                                    Forgot password ?
                                </Button>
                            </Grid>
                        </Grid>
                        <Grid
                            container
                            justify="center"
                            style={{ marginTop: "10px" }}
                        >
                            <Button
                                variant="outlined"
                                color="success"
                                style={{
                                    textTransform: "none",
                                    marginRight: "4px"
                                }}
                                onClick={this.onSubmitHandler}
                            >
                                Register
                                {isLoading ? (
                                    <CircularProgress />
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

export default withStyles(styles)(Signup);
