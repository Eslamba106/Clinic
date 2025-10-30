import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import ScrollToTop from "./components/common/ScrollToTop";
import ProtectedRoute from "./components/ProtectedRoute";

// Layouts
import AppLayout from "./layout/AppLayout";

// Pages
import SignIn from "./pages/AuthPages/SignIn";
import SignUp from "./pages/AuthPages/SignUp";
import Home from "./pages/Dashboard/Home";
import NotFound from "./pages/OtherPage/NotFound";
import BasicTables from "./pages/Tables/BasicTables";
import UserList from "./pages/Users/UserList";
import EditUser from "./pages/Users/EditUser";
export default function App() {
  return (
    <Router>
      <ScrollToTop />
      <Routes>
        <Route path="/" element={<SignIn />} />
        <Route path="/signup" element={<SignUp />} />
        <Route
          path="/dashboard/*"
          element={
            <ProtectedRoute>
              <AppLayout />
            </ProtectedRoute>
          }
        >
          <Route index element={<Home />} />
          <Route path="basic-tables" element={<BasicTables />} />
        </Route>
        <Route
          path="/users/*"
          element={
            <ProtectedRoute>
              <AppLayout />
            </ProtectedRoute>
          }
        >
          <Route index element={<UserList />} />
          <Route path="edit/:id" element={<EditUser />} />

        </Route>

        <Route path="*" element={<NotFound />} />
      </Routes>
    </Router>
  );
}
