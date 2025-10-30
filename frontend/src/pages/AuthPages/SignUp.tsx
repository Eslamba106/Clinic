import PageMeta from "../../components/common/PageMeta";
import AuthLayout from "./AuthPageLayout";
import SignUpForm from "../../components/auth/SignUpForm";

export default function SignUp() {
  return (
    <>
      <PageMeta
        title="Sign Up"
        description="This is SignUp Page Dashboard page for Clinic Management System  "
      />
      <AuthLayout>
        <SignUpForm />
      </AuthLayout>
    </>
  );
}
