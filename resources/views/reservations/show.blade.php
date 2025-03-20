                <div class="car-description">
                    <p>{{ $car->description }}</p>
                </div>

                <div class="specs-container">
                    <div class="specs-section">
                        <h3>Technické parametry</h3>
                        <div class="specs-grid">
                            <div class="spec-item">
                                <span class="spec-label"><i class="fas fa-tachometer-alt"></i> Výkon</span>
                                <span class="spec-value">{{ $car->power }} kW</span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label"><i class="fas fa-car-battery"></i> Motor</span>
                                <span class="spec-value">{{ $car->engine }}</span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label"><i class="fas fa-cog"></i> Převodovka</span>
                                <span class="spec-value">{{ $car->transmission }}</span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label"><i class="fas fa-gas-pump"></i> Spotřeba</span>
                                <span class="spec-value">{{ $car->fuel_consumption }} l/100km</span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label"><i class="fas fa-chair"></i> Počet sedadel</span>
                                <span class="spec-value">{{ $car->seats }}</span>
                            </div>
                            @if($car->max_speed)
                            <div class="spec-item">
                                <span class="spec-label"><i class="fas fa-gauge-high"></i> Max. rychlost</span>
                                <span class="spec-value">{{ $car->max_speed }} km/h</span>
                            </div>
                            @endif
                            @if($car->acceleration)
                            <div class="spec-item">
                                <span class="spec-label"><i class="fas fa-stopwatch"></i> Zrychlení 0-100</span>
                                <span class="spec-value">{{ $car->acceleration }} s</span>
                            </div>
                            @endif
                            @if($car->torque)
                            <div class="spec-item">
                                <span class="spec-label"><i class="fas fa-gauge"></i> Točivý moment</span>
                                <span class="spec-value">{{ $car->torque }} Nm</span>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="specs-section">
                        <h3>Informace o vozidle</h3>
                        <div class="specs-grid">
                            @if($car->color)
                            <div class="spec-item">
                                <span class="spec-label"><i class="fas fa-palette"></i> Barva</span>
                                <span class="spec-value">{{ $car->color }}</span>
                            </div>
                            @endif
                            @if($car->mileage)
                            <div class="spec-item">
                                <span class="spec-label"><i class="fas fa-road"></i> Najeto</span>
                                <span class="spec-value">{{ number_format($car->mileage, 0, ',', ' ') }} km</span>
                            </div>
                            @endif
                            @if($car->origin_country)
                            <div class="spec-item">
                                <span class="spec-label"><i class="fas fa-globe"></i> Země původu</span>
                                <span class="spec-value">{{ $car->origin_country }}</span>
                            </div>
                            @endif
                            @if($car->service_book)
                            <div class="spec-item">
                                <span class="spec-label"><i class="fas fa-book"></i> Servisní knížka</span>
                                <span class="spec-value">Ano</span>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="specs-section">
                        <h3>Výbava</h3>
                        <div class="specs-grid">
                            @if($car->air_conditioning)
                            <div class="spec-item">
                                <span class="spec-label"><i class="fas fa-snowflake"></i> Klimatizace</span>
                                <span class="spec-value">{{ $car->air_conditioning }}</span>
                            </div>
                            @endif
                            @if($car->parking_camera)
                            <div class="spec-item">
                                <span class="spec-label"><i class="fas fa-video"></i> Parkovací kamera</span>
                                <span class="spec-value">Ano</span>
                            </div>
                            @endif
                            @if($car->heated_seats)
                            <div class="spec-item">
                                <span class="spec-label"><i class="fas fa-temperature-high"></i> Vyhřívaná sedadla</span>
                                <span class="spec-value">Ano</span>
                            </div>
                            @endif
                            @if($car->safety_features)
                            <div class="spec-item full-width">
                                <span class="spec-label"><i class="fas fa-shield-alt"></i> Bezpečnostní systémy</span>
                                <span class="spec-value">{{ implode(', ', $car->safety_features) }}</span>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="specs-section">
                        <h3>Podmínky pronájmu</h3>
                        <div class="specs-grid">
                            @if($car->deposit)
                            <div class="spec-item">
                                <span class="spec-label"><i class="fas fa-money-bill"></i> Kauce</span>
                                <span class="spec-value">{{ number_format($car->deposit, 0, ',', ' ') }} Kč</span>
                            </div>
                            @endif
                            <div class="spec-item">
                                <span class="spec-label"><i class="fas fa-user"></i> Min. věk řidiče</span>
                                <span class="spec-value">{{ $car->min_driver_age }} let</span>
                            </div>
                            <div class="spec-item">
                                <span class="spec-label"><i class="fas fa-id-card"></i> Praxe s ŘP</span>
                                <span class="spec-value">{{ $car->min_license_length }} roky</span>
                            </div>
                            @if($car->mileage_limit)
                            <div class="spec-item">
                                <span class="spec-label"><i class="fas fa-tachometer"></i> Denní limit km</span>
                                <span class="spec-value">{{ $car->mileage_limit }} km</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <style>
                    .specs-container {
                        display: flex;
                        flex-direction: column;
                        gap: 2rem;
                        margin-top: 2rem;
                    }

                    .specs-section {
                        background: rgba(255, 255, 255, 0.05);
                        border-radius: 12px;
                        padding: 1.5rem;
                    }

                    .specs-section h3 {
                        color: #E44146;
                        font-size: 1.2rem;
                        margin-bottom: 1rem;
                        padding-bottom: 0.5rem;
                        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
                    }

                    .specs-grid {
                        display: grid;
                        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                        gap: 1rem;
                    }

                    .spec-item {
                        display: flex;
                        flex-direction: column;
                        gap: 0.5rem;
                    }

                    .spec-item.full-width {
                        grid-column: 1 / -1;
                    }

                    .spec-label {
                        color: rgba(255, 255, 255, 0.7);
                        font-size: 0.9rem;
                        display: flex;
                        align-items: center;
                        gap: 0.5rem;
                    }

                    .spec-label i {
                        color: #E44146;
                        width: 16px;
                        text-align: center;
                    }

                    .spec-value {
                        font-weight: 500;
                        color: #fff;
                    }

                    @media (max-width: 768px) {
                        .specs-grid {
                            grid-template-columns: 1fr;
                        }
                    }
                </style> 