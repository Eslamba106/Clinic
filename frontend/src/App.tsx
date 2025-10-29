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

export default function App() {
  return (
    <Router>
      <ScrollToTop />
      <Routes>
        {/* صفحة تسجيل الدخول */}
        <Route path="/" element={<SignIn />} />

        {/* صفحة التسجيل */}
        <Route path="/signup" element={<SignUp />} />

        {/* الصفحات المحمية */}
        <Route
          path="/dashboard/*"
          element={
            <ProtectedRoute>
              <AppLayout />
            </ProtectedRoute>
          }
        >
          {/* صفحة الداشبورد الرئيسية */}
          <Route index element={<Home />} />
          {/* باقي الصفحات داخل الداشبورد */}
        </Route>

        {/* لو المسار مش موجود */}
        <Route path="*" element={<NotFound />} />
      </Routes>
    </Router>
  );
}
