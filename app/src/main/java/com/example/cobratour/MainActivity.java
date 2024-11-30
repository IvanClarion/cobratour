package com.example.cobratour;

import android.os.Bundle;
import android.view.View;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.graphics.Insets;
import androidx.core.view.ViewCompat;
import androidx.core.view.WindowInsetsCompat;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;
import androidx.fragment.app.FragmentTransaction;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        // Apply insets for system bars
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main), (v, insets) -> {
            Insets systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars());
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom);
            return insets;
        });

        // Set up continue_button to load SurveyFragment1 with a bounce animation
        findViewById(R.id.continue_button).setOnClickListener(v -> {
            Animation bounce = AnimationUtils.loadAnimation(MainActivity.this, R.anim.bounce);
            v.startAnimation(bounce);
            v.postDelayed(() -> {
                v.setVisibility(View.GONE); // Hide the button
                clearBackStack(); // Clear back stack before loading new fragment

                // Hide the FrameLayout before showing the new fragment
                findViewById(R.id.fragment_container).setVisibility(View.GONE);

                // Replace with SurveyFragment1 and make it visible
                replaceFragment(new SurveyFragment1(), false);
            }, 400); // Delay to match the animation duration
        });
    }

    // Helper function to replace fragment with animations
    public void replaceFragment(Fragment fragment, boolean addToBackStack) {
        FragmentManager fragmentManager = getSupportFragmentManager();
        FragmentTransaction fragmentTransaction = fragmentManager.beginTransaction();

        // Set custom animations for fragment transitions
        if (fragment instanceof SurveyFragment2) {
            fragmentTransaction.setCustomAnimations(R.anim.slide_in_right, R.anim.slide_out_left);
        } else {
            // Optionally set animations for other fragments
            fragmentTransaction.setCustomAnimations(android.R.anim.fade_in, android.R.anim.fade_out);
        }

        fragmentTransaction.replace(R.id.fragment_container, fragment);
        if (addToBackStack) {
            fragmentTransaction.addToBackStack(null);
        }

        fragmentTransaction.commit();

        // Show the FrameLayout only after the new fragment is added
        findViewById(R.id.fragment_container).setVisibility(View.VISIBLE);
    }

    // Method to clear the back stack
    public void clearBackStack() {
        FragmentManager fragmentManager = getSupportFragmentManager();
        if (fragmentManager.getBackStackEntryCount() > 0) {
            fragmentManager.popBackStack(null, FragmentManager.POP_BACK_STACK_INCLUSIVE);
        }
    }
}
