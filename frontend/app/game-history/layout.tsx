"use client";

import { useState } from "react";
import { useRouter } from "next/navigation";
import {
    Box,
    AppBar,
    Toolbar,
    Typography,
    IconButton,
    ListItemText,
    Divider,
    Drawer,
    List,
    ListItem,
    ListItemButton,
    ThemeProvider,
    createTheme
} from "@mui/material";
import MenuIcon from '@mui/icons-material/Menu';

declare module "@mui/material/styles" {
    interface BreakpointOverrides {
        xs: false;
        sm: false;
        md: false;
        lg: false;
        xl: false;
        mobile: true;
        desktop: true;
    }
}

const defaultTheme = createTheme({
    breakpoints: {
        values: {
            mobile: 0,
            desktop: 600,
        },
    },
});

export default function MygamesLayout({
    children,
}: {
    children: React.ReactNode;
}) {
    const [open, setOpen] = useState(false);

    const toggleDrawer = (open: boolean) => {
        setOpen(open);
    }

    const router = useRouter();

    const list = () => (
        <Box sx={{ width: 240 }}>
            <Toolbar />
            <Divider />
            <List>
                <ListItem component="a" href="/game-history/mygames" disablePadding>
                    <ListItemButton>
                        <ListItemText primary="My Games" />
                    </ListItemButton>
                </ListItem>
                <ListItem component="a" href="/game-history/games" disablePadding>
                <ListItemButton>
                        <ListItemText primary="Games" />
                    </ListItemButton>
                </ListItem>
                <Divider />
            </List>
        </Box>
    );

    return (
        <ThemeProvider theme={defaultTheme}>
            <Box sx={{ display: 'flex' }}>
                <AppBar position="fixed" >
                    <Toolbar>
                        <IconButton onClick={() => toggleDrawer(true)}>
                            <MenuIcon />
                        </IconButton>
                        <Typography
                            variant="h6"
                            noWrap
                            component="div"
                            sx={{ flexGrow: 1 }}
                        >
                            GameHistory
                        </Typography>
                    </Toolbar>
                </AppBar>
                <Drawer open={open} onClose={() => toggleDrawer(false)} anchor="left">
                    {list()}
                </Drawer>
                <Box
                    component="main"
                    sx={{
                        flexGrow: 1,
                        p: 3,
                        marginTop: "64px",
                        width: "100%",
                        background: 'white',
                    }}
                >
                    {children}
                </Box>
                <Box
                    component='footer'
                    sx={{
                        width: '100%',
                        position: 'fixed',
                        textAlign: 'center',
                        bottom: 0,
                        background: '#1976d2',
                    }}
                >
                    <Typography variant='caption' sx={{ color: 'white' }}>
                        &copy; 2025 GameHistory
                    </Typography>
                </Box>
            </Box>
        </ThemeProvider>
    );
}